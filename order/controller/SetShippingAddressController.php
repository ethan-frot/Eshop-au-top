<?php

require_once './order/model/repository/OrderRepository.php';

class SetShippingAddressController
{
    public function setShippingAddress(): void
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './common/view/404.php';
            return;
        }

        require_once './order/view/set-shipping-address.php';
    }
}
