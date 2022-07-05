<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_NUMERIC = 'numeric';
    public const RULE_UNIQUE = 'unique';


    public function loadData($data)
    {
        foreach ($data as $key => $value)
        {


            if(property_exists($this, $key)){

                /*$data['sku'] &&  $data['name'] ? $this->{$key} = strval($value) : $this->{$key} = intval($value);*/
                $this->{$key} = $value;

            }
        }
    }
    abstract public function rules(): array;

    public array $errors = [];

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules)
        {
            $value = $this->{$attribute};
            foreach ($rules as $rule)
            {
                $ruleName = $rule;
                if (!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                $filter_options = array(
                    'options' => array( 'min_range' => 1)
                );
                if ($ruleName === self::RULE_NUMERIC && !filter_var($value, FILTER_VALIDATE_INT, $filter_options)  ){
                    $this->addError($attribute, self::RULE_NUMERIC);
                }
                if($ruleName === self::RULE_UNIQUE){
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
                    $statement->bindValue(":attr", $value);
                    $statement ->execute();
                    $record = $statement->fetchObject();
                    if($record) {
                        $this->addError($attribute, self::RULE_UNIQUE, ['field'=> $attribute]);
                    }
                }
            }
        }
        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule, $params=[])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value){
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][]= $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_NUMERIC =>  'This field needs to be a number greater than 0',
            self::RULE_UNIQUE=> 'Record with this {field} already exists'

        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute){
        return $this->errors[$attribute][0]   ?? false;
    }
}

