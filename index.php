<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./order/controller/IndexController.php');
require_once('./order/controller/ProcessOrderCreateController.php');
require_once('./order/controller/PayController.php');
require_once('./order/controller/ProcessPaymentController.php');
require_once('./order/controller/ProcessShippingAddressController.php');
require_once('./order/controller/ProcessShippingMethodController.php');
require_once('./order/controller/SetShippingAddressController.php');
require_once('./order/controller/SetShippingMethodController.php');

require_once('./product/controller/CreateProductController.php');
require_once('./product/controller/ProcessCreateProductController.php');
require_once('./product/controller/ListProductsController.php');
require_once('./product/controller/DeleteProductController.php');
require_once('./product/controller/AddToCartController.php');

// Récupère l'url actuelle et supprime le chemin de base
// c'est à dire : http://localhost:8888/Eshop-au-top/public/
// donc cela ne garde que la fin de l'url

$requestUri = $_SERVER['REQUEST_URI'];
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/Eshop-au-top/', '', $uri);
$endUri = trim($endUri, '/');


if($endUri === "") {
    $indexController = new IndexController();
    $indexController->index();
    return;
} 

if($endUri === "create-order") {
    $createOrderController = new CreateOrderController();
    $createOrderController->createOrder();
    return;
}  


if ($endUri === "pay") {
    $payController = new PayController();
    $payController->pay();
    return;
}


if ($endUri === "process-payment") {
    $payController = new ProcessPaymentController();
    $payController->processPayment();
    return;
}

if ($endUri === "process-shipping-address") {
    $payController = new ProcessShippingAddressController();
    $payController->processShippingAddress();
    return;
}

if ($endUri === "process-shipping-method") {
    $payController = new ProcessShippingMethodController();
    $payController->processShippingMethod();
    return;
}

if ($endUri === "set-shipping-address") {
    $payController = new SetShippingAddressController();
    $payController->setShippingAddress();
    return;
}

if ($endUri === "set-shipping-method") {
    $payController = new SetShippingMethodController();
    $payController->setShippingMethod();
    return;
}

if($endUri === "create-product") {
    $createProductController = new CreateProductController();
    $createProductController->indexCreateProduct();
    return;
}

if($endUri === "create-product-process") {
    $processCreateProductController = new ProcessCreateProductController();
    $processCreateProductController->createProduct();
    return;
}

if($endUri === "list-products") {
    $listProductsController = new ListProductsController();
    $listProductsController->listProducts();
    return;
}

if($endUri === "delete-product") {
    $deleteProductController = new DeleteProductController();
    $deleteProductController->deleteProduct();
    return;
}

if($endUri === "add-to-cart") {
    $addToCartController = new AddToCartController();
    $addToCartController->addToCart();
    return;
}