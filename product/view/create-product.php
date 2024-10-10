<?php require_once('./order/view/partials/header.php'); ?>
    <main>
        <form method="POST" action="http://localhost:8888/esd-oop-php/create-product-process">

            <label for="productTitle">Nom du produit</label>
            <input type="text" id="productTitle" name="productTitle" required pattern="^[a-zA-Z0-9\s]{3,100}$">
            <br>
            <label for="productPrice">Prix</label>
            <input type="number" id="productPrice" name="productPrice" step="0.01">
            <br>
            <label for="productDescription">Description du produit</label>
            <textarea id="productDescription" name="productDescription" rows="5" cols="30" style="resize: none;"></textarea>
            <br>
            <label for="productStatus">Produit actif ?</label>
            <input type="checkbox" id="productStatus" name="productStatus">
            <br>
            <button type="submit">Ajouter</button>
        </form>
    </main>

<?php require_once('./order/view/partials/footer.php'); ?>