<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\ProductModel;

class ProductController extends Controller
{
    public function addProduct()
    {
        return $this->render('/products');
    }
    public function createProduct(Request $request)
    {
        $productModel = new ProductModel();
        if($request->isPost()){

            $productModel->loadData($request->getBody());

            if($productModel->validate() && $productModel->addProduct()) {
                return 'Success';

            }
            /*echo '<pre>';
            var_dump($productModel->errors);
            echo '</pre>';
            exit;*/

            return $this->render('createProduct', [
                'model' => $productModel
            ]);
        }
        $this->setLayout('main');
        return $this->render('createProduct', [
            'model' => $productModel
        ]);
    }
}