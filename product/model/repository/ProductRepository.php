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

    public function findAllActiveProducts(): ?array {
        if (!isset($_SESSION['products'])) {
            return null;
        }

        $activeProducts = array_filter($_SESSION['products'], function($product) {
            return $product->getStatus() === 'Actif';
        });

        return !empty($activeProducts) ? $activeProducts : null;
    }

    public function findById(int $id): ?Product {

        foreach ($_SESSION['products'] as $product) {
            if ($product->getId() == $id) {
              return $product;
            }
        }

        return null;
    }



    public function findByIds(array $ids): ?array {

        $productMatched = [];

        foreach ($ids as $id) {
            $product = $this->findById($id);
            $productMatched[] = $product;
        }

        return $productMatched;
    }
    public function deleteById(int $id): bool
    {
        if (!isset($_SESSION['products'])) {
            return false;
        }

        foreach ($_SESSION['products'] as $index => $product) {
            if ($product->getId() == $id) {
                unset($_SESSION['products'][$index]);
                $_SESSION['products'] = array_values($_SESSION['products']);
                return true;
            }
        }

        return false;
    }

}