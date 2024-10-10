<?php

require_once './product/model/repository/ProductRepository.php';

class ListProductsController
{
    public function listProducts(): void
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->findAll();

        if (!$products) {
            require_once './order/view/404.php';
            return;
        }

        require_once './product/view/list-products.php';
    }
}
