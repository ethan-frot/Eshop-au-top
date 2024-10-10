<?php

require_once './product/model/repository/ProductRepository.php';

class IndexController {

	public function index(): void
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->findAll();

        if (!$products) {
            $errorMessage = "Y'a aucun produit, fait un effort";
            require_once './order/view/order-error.php';
            return;
        }

		require_once('./order/view/home.php');
	}

}



