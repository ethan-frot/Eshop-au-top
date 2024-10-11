<?php require_once('./order/view/partials/header.php'); ?>

    <main>
        <p>Liste des produits :</p>
        <ul>
            <?php foreach ($products as $product) : ?>
                <form method="post" action="http://localhost:8888/esd-oop-php/delete-product">
                    <h2>Titre : <?php echo $product->getTitle(); ?></h2>
                    <h3>Prix : <?php echo $product->getPrice(); ?></h3>
                    <h4>Description : <?php echo $product->getDescription(); ?></h4>
                    <h4>Status : <?php echo $product->getStatus(); ?></h4>
                    <input type="hidden" name="productId" value="<?php echo $product->getId(); ?>">
                    <button type="submit"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button>
                </form>

            <?php endforeach; ?>
        </ul>
    </main>

<?php require_once('./order/view/partials/footer.php'); ?>