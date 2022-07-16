<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_NUMERIC = 'numeric';
    public const RULE_UNIQUE = 'unique';
    public const RULE_ERROR = 'error';
    public const RULE_SWITCHER = 'error';
    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED, ['field' => $attribute]);
                }
                if ($ruleName === self::RULE_SWITCHER && !$value) {
                    $this->addError($attribute, self::RULE_SWITCHER, ['field' => $attribute]);
                }
                $filter_options = array(
                    'options' => array('min_range' => 1)
                );
                if ($ruleName === self::RULE_NUMERIC && !filter_var($value, FILTER_VALIDATE_INT, $filter_options)) {
                    $this->addError($attribute, self::RULE_NUMERIC, ['field' => $attribute]);
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
                    $statement->bindValue(":attr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        $this->addError($attribute, self::RULE_UNIQUE, ['field' => $attribute]);
                    }
                }
                $appData = new Request();
                $data = $appData->getBody();
                if($ruleName === self::RULE_ERROR && in_array( $data['size'] && $data['weight']  , $data)){
                    $this->addError($attribute, self::RULE_ERROR);
                }elseif ($ruleName === self::RULE_ERROR && in_array( $data['size'] && $data['height']  , $data)){
                    $this->addError($attribute, self::RULE_ERROR);
                }elseif ($ruleName === self::RULE_ERROR && in_array( $data['weight'] && $data['height']  , $data)){
                    $this->addError($attribute, self::RULE_ERROR);
                }elseif ($ruleName === self::RULE_ERROR && in_array( $data['size'] && $data['width']  , $data)){
                    $this->addError($attribute, self::RULE_ERROR);
                }elseif ($ruleName === self::RULE_ERROR && in_array( $data['size'] && $data['length']  , $data)){
                    $this->addError($attribute, self::RULE_ERROR);
                }elseif ($ruleName === self::RULE_ERROR && in_array( $data['weight'] && $data['width']  , $data)){
                    $this->addError($attribute, self::RULE_ERROR);
                }elseif ($ruleName === self::RULE_ERROR && in_array( $data['weight'] && $data['length']  , $data)){
                    $this->addError($attribute, self::RULE_ERROR);
                }
            }
        }
        return empty($this->errors);
    }

    abstract public function rules(): array;

    public function addError(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => '{field} is required',
            self::RULE_NUMERIC => '{field} needs to be a number greater than 0',
            self::RULE_UNIQUE => 'Record with this {field} already exists',
            self::RULE_ERROR=> 'Please select one option from type switcher',
            self::RULE_SWITCHER => 'Please select one option from type switcher',

        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        $errors = $this->errors[$attribute][0] ?? false;
        return $errors[0] ?? '';
    }
}

