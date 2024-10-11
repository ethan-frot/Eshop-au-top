<?php

require_once './order/model/repository/OrderRepository.php';
require_once './product/model/repository/ProductRepository.php';

class PayController
{
    public function pay(): void
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './order/view/404.php';
            return;
        }

        $productRepository = new ProductRepository();
        $selectedProductIds = $order->getSelectedProductIds();
        $products = $productRepository->findSelectedProducts($selectedProductIds);

        require_once './order/view/pay.php';
    }
}
