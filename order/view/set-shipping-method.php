<?php require_once('./order/view/partials/header.php'); ?>

<main class="d-flex justify-content-center align-items-center flex-column text-center">
    <h1 class="display-4">Méthode de livraison</h1>
    <p class="lead">Choisissez la méthode de livraison :</p>

    <form method="POST" action="http://localhost:8888/Eshop-au-top/process-shipping-method" class="w-50">
        <div class="mb-3">
            <label for="shippingMethod" class="form-label">Méthode de livraison</label>
            <select id="shippingMethod" name="shippingMethod" class="form-select">
                <option value="Chronopost Express">Chronopost Express (+5€)</option>
                <option value="Point relais">Point relais</option>
                <option value="Domicile">Domicile</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
