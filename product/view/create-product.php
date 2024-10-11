<?php require_once('./order/view/partials/header.php'); ?>

<main class="d-flex justify-content-center align-items-center flex-column text-center">
    <h1 class="display-4">Créer un produit</h1>

    <form method="POST" action="http://localhost:8888/Eshop-au-top/create-product-process" class="w-50">
        <div class="mb-3">
            <label for="productTitle" class="form-label">Nom du produit</label>
            <input type="text" id="productTitle" name="productTitle" class="form-control" required pattern="^[a-zA-Z0-9\s]{3,100}$">
        </div>

        <div class="mb-3">
            <label for="productPrice" class="form-label">Prix</label>
            <input type="number" id="productPrice" name="productPrice" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="productDescription" class="form-label">Description du produit</label>
            <textarea id="productDescription" name="productDescription" class="form-control" rows="5" style="resize: none;"></textarea>
        </div>

        <div class="mb-3 form-check d-flex justify-content-center">
            <input type="checkbox" id="productStatus" name="productStatus" class="form-check-input me-2" aria-label="Produit actif ?">
            <label for="productStatus" class="form-check-label">Produit actif ?</label>
        </div>


        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
    </form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
