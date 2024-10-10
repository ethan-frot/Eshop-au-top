<?php

require_once './products/model/entity/Products.php';
require_once './products/model/repository/ProductsRepository.php';


class ProcessCreateProductsController {
    public function createProducts() {
        try {
            if (!isset($_POST['productTitle']) || !isset($_POST['productDescription'])) {
                $errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";

                require_once './products/view/product-error.php';
                return;
            }

            $title = $_POST['productTitle'];
            $price = $_POST['productPrice'];
            $description = $_POST['productDescription'];
            $status = $_POST['productStatus'];

            $product = new Products($title, $price, $description, $status);

            $productRepository = new ProductsRepository();
            $productRepository->persist($product);

            require_once './products/view/product-created.php';

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './products/view/product-error.php';
        }
    }
}

