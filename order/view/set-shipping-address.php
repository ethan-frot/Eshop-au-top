<?php require_once('./common/view/partials/header.php'); ?>

<main class="d-flex justify-content-center align-items-center flex-column text-center">
    <h1 class="display-4">Adresse de livraison</h1>
    <p class="lead">Remplissez l'adresse de livraison :</p>

    <form method="POST" action="http://localhost:8888/Eshop-au-top/process-shipping-address" class="w-50">
        <div class="mb-3">
            <label for="shippingCountry" class="form-label">Pays de livraison</label>
            <input type="text" id="shippingCountry" name="shippingCountry" class="form-control" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="Le pays doit contenir entre 5 et 50 caractères et des espaces.">
        </div>

        <div class="mb-3">
            <label for="shippingCity" class="form-label">Ville de livraison</label>
            <input type="text" id="shippingCity" name="shippingCity" class="form-control" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="La Ville doit contenir entre 5 et 50 caractères.">
        </div>

        <div class="mb-3">
            <label for="shippingAddress" class="form-label">Adresse de livraison</label>
            <input type="text" id="shippingAddress" name="shippingAddress" class="form-control" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="L'adresse doit contenir entre 5 et 50 caractères et des espaces.">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</main>

<?php require_once('./common/view/partials/footer.php'); ?>
