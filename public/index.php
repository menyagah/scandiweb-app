<?php

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\ProductController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);


$app->router->get('/products', [new ProductController(), 'product']);
$app->router->post('/products', [new ProductController(), 'product']);
$app->router->get('/add-product', [new ProductController(), 'createProduct']);
$app->router->post('/add-product', [new ProductController(), 'createProduct']);

$app->run();

