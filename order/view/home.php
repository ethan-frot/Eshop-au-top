<?php require_once('./order/view/partials/header.php'); ?>

<main class="d-flex justify-content-center align-items-center flex-column ">

    <div class="container">
        <h2 class="text-center mb-4">Passer une commande</h2>

        <form method="POST" action="http://localhost:8888/Eshop-au-top/create-order" class="row g-3">

            <div class="col-md-6 offset-md-3">
                <label for="customerName" class="form-label">Nom du client</label>
                <input type="text" id="customerName" name="customerName" class="form-control" placeholder="Entrez votre nom" required>
            </div>

            <div class="col-md-6 offset-md-3">
                <label for="product" class="form-label">Produit</label>
                <select id="product" name="productIds[]" class="form-select" multiple size="3" required>
                    <?php foreach ($products as $product) : ?>
                        <option value="<?php echo $product->getId(); ?>"><?php echo $product->getTitle(); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-text text-light">Utilisez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs produits.</div>
            </div>

            <div class="col-md-6 offset-md-3 text-center">
                <button type="submit" class="btn btn-primary w-100">Ajouter à la commande</button>
            </div>

        </form>
    </div>

</main>

<?php require_once('./order/view/partials/footer.php'); ?>
