<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';
require_once './product/model/repository/ProductRepository.php';


class CreateOrderController {

	public function createOrder(): void
    {
		try {

			if (!isset($_POST['customerName']) || !isset($_POST['productIds'])) {
				$errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
				
				require_once './order/view/order-error.php';
				return;
			}

			$customerName = $_POST['customerName'];
			$productIds = $_POST['productIds'];

            $productRepository = new ProductRepository();
            $products = $productRepository->findByIds($productIds);

            if (!$products) {
                $errorMessage = "T'essaye de m'embobinner là";
                require_once './product/view/product-error.php';
                return;
            }

			$order = new Order($customerName, $products);

			$orderRepository = new OrderRepository();
			$orderRepository->persist($order);

			require_once './order/view/order-created.php';

		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
			require_once './order/view/order-error.php';
		}


	}


}

