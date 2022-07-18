<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\Product;

class ProductController
{
    public function product()
    {
        $productModel = new Product();
        $products = $productModel->products();
        $dataApi= [];
        foreach ($products as $product){
                $new = array(
                'id'=>$product['id'],
                'sku'=>$product['sku'],
                'name'=>$product['name'],
                'price'=>$product['price'],
                'size'=>$product['size'],
                'weight'=>$product['weight'],
                'height'=>$product['height'],
                'width'=> $product['width'],
                'length'=>$product['length']) ;

                array_push($dataApi, $new);


        }

        return json_encode($dataApi);

    }

    public function deleteProduct(Request $request)
    {
        $request = new Request;
         $data = [];
        foreach($request->getBody() as $key=>$value){
            $new = array($key = $value);
            array_push($data, $new);
        }
        $id = implode (",", $data[0][0]);
        $productModel = new Product();
        $products = $productModel->delete($id);
        var_dump($id);
       
    }

    public function createProduct(Request $request)
    {
        $productModel = new Product();
        if ($request->isPost()) {
            
            $productModel->loadData($request->getBody());
            if ($productModel->validate() && $productModel->addProduct()) {
                return Application::$app->response->redirect('/products');
            }else{
                return json_encode($productModel);
            }
        }
        return   json_encode($productModel);
    }
}