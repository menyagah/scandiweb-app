<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_NUMERIC = 'numeric';


    public function loadData($data)
    {
        foreach ($data as $key => $value)
        {
            if(property_exists($this, $key)){
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
                if ($ruleName === self::RULE_NUMERIC && !filter_var($value, FILTER_VALIDATE_INT)  ){
                    $this->addError($attribute, self::RULE_NUMERIC);
                }
            }
        }
        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule)
    {
        $message = $this->errorMessages()[$rule] ?? '';
        $this->errors[$attribute][]= $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_NUMERIC =>  'This field needs to be a number'

        ];
    }
}