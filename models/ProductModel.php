<?php

namespace app\models;

use app\core\Model;
use app\core\Request;



class ProductModel extends Model
{

    public string $sku;
    public string $name;
    public string $price;
    public ?string $size = null;
    public ?string $weight = null;
    public ?string $height = null;
    public ?string $width = null;
    public ?string $length = null;


    public function addProduct(){
        echo 'data added';
    }

    public function rules(): array
    {

        $appData = new Request();
        if(in_array("size",$appData->getBody())){
            return [
                'sku' => [self::RULE_REQUIRED],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'size' => [self::RULE_REQUIRED,  self::RULE_NUMERIC]
            ];
        } elseif (in_array("weight", $appData->getBody())){
            return [
                'sku' => [self::RULE_REQUIRED],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED , self::RULE_NUMERIC],
                'weight' => [self::RULE_REQUIRED, self::RULE_NUMERIC]
            ];
        }elseif (in_array("height" && "width" && "length",$appData->getBody())){
            return [
                'sku' => [self::RULE_REQUIRED],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'height' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'width' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'length' => [self::RULE_REQUIRED, self::RULE_NUMERIC]
            ];
        }else{
            return  [
                'sku' => [self::RULE_REQUIRED],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'size' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'weight' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'height' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'width' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'length' => [self::RULE_REQUIRED, self::RULE_NUMERIC]
            ];
        }

    }

}