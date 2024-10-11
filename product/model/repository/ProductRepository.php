<?php

require_once './product/model/entity/Product.php';

class ProductRepository
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function persist(Product $product): Product
    {
        $_SESSION['products'][] = $product;
        return $product;
    }

    public function findAll(): ?array
    {
        if (!isset($_SESSION['products'])) {
            return null;
        }

        return $_SESSION['products'];
    }

    public function findById(int $id): ?Product {
        foreach ($_SESSION['products'] as $product) {
            if ($product->getId() == $id) {
                return $product;
            }
        }

        return null;
    }

    public function findSelectedProducts(array $productIds): array
    {
        $selectedProducts = [];

        foreach ($productIds as $id) {
            $product = $this->findById($id);
            if ($product) {
                $selectedProducts[] = $product;
            }
        }

        return $selectedProducts;
    }


}