<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;
use app\core\Model;
use app\core\Request;


class Product extends DbModel
{

    public string $sku = '';
    public string $name = '';
    public ?string $price = null;
    public ?string $size = null;
    public ?string $weight = null;
    public ?string $height = null;
    public ?string $width = null;
    public ?string $length = null;

    public  function products()
    {
        return $this->getProducts();
    }

    public function tableName(): string
    {
        return 'products';
    }

    public function addProduct()
    {
        return $this->save();
    }

     public function delete($id)
    {
        
        return $this->deleteProduct($id);
    }

    public function rules(): array
    {
        $appData = new Request();
        $appData->getBody();
        if (in_array($appData->getBody()["size"], $appData->getBody())) {
            return [
                'sku' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'size' => [self::RULE_REQUIRED, self::RULE_SWITCHER,  self::RULE_ERROR]
            ];
        } elseif (in_array($appData->getBody()["weight"], $appData->getBody())) {
            return [
                'sku' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'weight' => [self::RULE_REQUIRED, self::RULE_ERROR]
            ];
        } elseif (in_array($appData->getBody()["height"] && $appData->getBody()["width"] && $appData->getBody()["length"], $appData->getBody())) {
            return [
                'sku' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'height' => [self::RULE_REQUIRED, self::RULE_ERROR],
                'width' => [self::RULE_REQUIRED,  self::RULE_ERROR],
                'length' => [self::RULE_REQUIRED,  self::RULE_ERROR]
            ];
        } else {
            return [
                'sku' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
                'name' => [self::RULE_REQUIRED],
                'price' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
                'size' => [self::RULE_REQUIRED,  self::RULE_ERROR],
                'weight' => [self::RULE_REQUIRED,  self::RULE_ERROR],
                'height' => [self::RULE_REQUIRED,  self::RULE_ERROR],
                'width' => [self::RULE_REQUIRED,  self::RULE_ERROR],
                'length' => [self::RULE_REQUIRED,  self::RULE_ERROR]
            ];
        }


    }


    public function attributes(): array
    {
        return ['sku', 'name', 'price', 'size', 'weight', 'height', 'width', 'length'];
    }

}