<?php

require_once './product/model/repository/ProductRepository.php';

class IndexController {

	public function index(): void
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->findAll();

        if (!$products) {
            require_once './order/view/404.php';
            return;
        }

		require_once('./order/view/home.php');
	}

}



