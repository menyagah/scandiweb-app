<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\models\Product;

class ProductController
{
    public function product()
    {
        $productModel = new Product();
        $products = $productModel->getProducts();
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

    public function createProduct(Request $request)
    {
        $productModel = new Product();
        if ($request->isPost()) {

            $productModel->loadData($request->getBody());

            if ($productModel->validate() && $productModel->addProduct()) {
                return Application::$app->response->redirect('/products');
            }
            $errorsApi= [];
            foreach ($productModel as $error){
                $new = array( $error) ;

                array_push($errorsApi, $new);


            }
            $errorsData = [];
            foreach ($errorsApi as $error){
                $new = array( 'sku'=>$errorsApi[0][0]["sku"],
                    'name'=>$errorsApi[0][0]['name'],
                    'price'=>$errorsApi[0][0]['price'],
                    'size'=>$errorsApi[0][0]['size'],
                    'weight'=>$errorsApi[0][0]['weight'],
                    'height'=>$errorsApi[0][0]['height'],
                    'width'=> $errorsApi[0][0]['width'],
                    'length'=>$errorsApi[0][0]['length']) ;

                array_push($errorsData, $new);


            }
            return json_encode($errorsData[0]);
        }
        return   $productModel;
    }
}