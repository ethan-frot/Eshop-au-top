<?php

require_once './products/model/entity/Products.php';

class ProductsRepository
{
    public function __construct()
    {
        session_start();
    }

    public function persist(Products $products): Products
    {
        $_SESSION['products'] = $products;
        return $products;
    }

    public function find(): ?Products
    {
        if (!isset($_SESSION['products'])) {
            return null;
        }

        return $_SESSION['products'];
    }

}