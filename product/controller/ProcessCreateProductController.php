<?php

require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';


class ProcessCreateProductController {
    public function createProduct() {
        try {
            if (!isset($_POST['productTitle']) || !isset($_POST['productDescription'])) {
                $errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";

                require_once './product/view/product-error.php';
                return;
            }

            $title = $_POST['productTitle'];
            $price = (float)$_POST['productPrice'];
            $description = $_POST['productDescription'];
            $status = $_POST['productStatus'] ?? null;

            $product = new Product($title, $price, $description, $status);

            $productRepository = new ProductRepository();
            $productRepository->persist($product);

            require_once './product/view/product-created.php';

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './product/view/product-error.php';
        }
    }
}

