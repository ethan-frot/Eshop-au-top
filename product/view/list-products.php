<?php require_once('./order/view/partials/header.php'); ?>

    <main>
        <p>Liste des produits :</p>
        <ul>
            <?php foreach ($products as $product) : ?>
            <li>
                <h2>Titre : <?php echo $product->getTitle(); ?></h2>
                <h3>Prix : <?php echo $product->getPrice(); ?></h3>
                <h4>Description : <?php echo $product->getDescription(); ?></h4>
                <h4>Status : <?php echo $product->getStatus(); ?></h4>
            </li>
            <?php endforeach; ?>
        </ul>
    </main>

<?php require_once('./order/view/partials/footer.php'); ?>