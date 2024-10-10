<?php require_once('./order/view/partials/header.php'); ?>

    <main>
        <p>Liste des produits :</p>
        <?php foreach ($products as $product) : ?>
        <li> <?php echo $product->getTitle(); ?> </li>
        <?php endforeach; ?>
    </main>

<?php require_once('./order/view/partials/footer.php'); ?>