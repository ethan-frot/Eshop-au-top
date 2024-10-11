<?php

require_once './product/model/repository/ProductRepository.php';

class DeleteProductController
{
    public function deleteProduct(): void
    {
        $productRepository = new ProductRepository();

        if (!isset($_POST['productId'])) {
            $errorMessage = "Essaye pas de supprimer un produit qui n'existe pas.";
            require_once './product/view/product-error.php';
            return;
        }

        $productToDelete = $_POST['productId'];
        $deletedProduct = $productRepository->deleteById($productToDelete);

        if (!$deletedProduct) {
            $errorMessage = "Essaye pas de supprimer un produit qui n'existe pas.";
            require_once './product/view/product-error.php';
            return;
        }

        require_once './product/view/deleted-product.php';

    }
}
