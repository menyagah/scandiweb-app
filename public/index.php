<?php


require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\ProductController;

$app = new Application(dirname(__DIR__));


$app->router->get('/products', [new ProductController(), 'addProduct']);
$app->router->post('/products', [new ProductController(), 'addProduct']);
$app->router->get('/products/createProduct', [new ProductController(), 'createProduct']);
$app->router->post('/products/createProduct', [new ProductController(), 'createProduct']);

$app->run();

