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
                $new = array('sku'=>$product['sku'],
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

    public function deleteProduct($id)
    {
        $request = new Request;
        $str_path = explode ("/", $request->getUrl());
        $id = $str_path[2];
        $productModel = new Product();
        $products = $productModel->delete($id);
        return var_dump($request->getUrl());
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