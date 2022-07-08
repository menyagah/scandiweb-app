<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Product;

class ProductController extends Controller
{
    public function product()
    {
        $productModel = new Product();
        $products = $productModel->getData();
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

            return  json_encode($productModel);

        }
        return  json_encode($productModel);
    }
}