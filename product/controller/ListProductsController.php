<?php

require_once './product/model/repository/ProductRepository.php';

class ListProductsController
{
    public function listProducts(): void
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->findAll();

        if (!$products) {
            $errorMessage = "Y'a aucun produit, fait un effort";
            require_once './product/view/product-error.php';
            return;
        }

        require_once './product/view/list-products.php';
    }
}
