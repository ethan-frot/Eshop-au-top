<?php require_once('./order/view/partials/header.php'); ?>
    <main>
        <form method="POST" action="http://localhost:8888/esd-oop-php/create-product-process">

            <label for="productTitle">Nom du produit</label>
            <input type="text" id="productTitle" name="productTitle" required pattern="^[a-zA-Z0-9\s]{3,100}$">
            <br>
            <label for="productDescription">Description du produit</label>
            <input type="text" id="productDescription" name="productDescription" required pattern="^[a-zA-Z0-9\s]{3,300}$">
            <br>


            <button type="submit">Ajouter</button>
        </form>
    </main>

<?php require_once('./order/view/partials/footer.php'); ?>