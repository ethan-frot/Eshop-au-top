<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';
require_once './product/model/repository/ProductRepository.php';

class AddToCartController {
    public function addToCart(): void
    {
        try {
            $orderRepository = new OrderRepository();
            $order = $orderRepository->find();

            if (!$order) {
                header('Location: http://localhost:8888/Eshop-au-top/');
            }

            if (!isset($_POST['productId'])) {
                $errorMessage = "Ajoute pas n'importe quoi";
                require_once './product/view/product-error.php';
                return;
            }

            $productId = $_POST['productId'];

            $productRepository = new ProductRepository();
            $product = $productRepository->findById($productId);

            if (!$product) {
                $errorMessage = "T'essaye de m'embobinner là";
                require_once './product/view/product-error.php';
                return;
            }

            $order->addProduct($product);

            $orderRepository->persist($order);

            require_once('./product/view/add-to-cart.php');

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './product/view/product-error.php';
        }
    }

}