<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;
    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName(".implode(',',$attributes).") VALUES(".implode(',',$params).")");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public function deleteProduct($id)
    {
        $statement = Application::$app->db->prepare("DELETE FROM products WHERE ID = :id LIMIT 1");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
        
    }

    public function getProducts()
    {
        
        $statement = Application::$app->db->prepare("SELECT * FROM products");

        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    public function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }


}