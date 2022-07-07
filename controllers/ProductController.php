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
        return $this->render('/productList', [
            'data' => $products
        ]);
    }

    public function createProduct(Request $request)
    {
        $productModel = new Product();
        if ($request->isPost()) {
            $productModel->loadData($request->getBody());

            if ($productModel->validate() && $productModel->addProduct()) {
                return Application::$app->response->redirect('/products');
            }

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