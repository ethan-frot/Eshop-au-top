<?php require_once('./order/view/partials/header.php'); ?>

<main class="d-flex justify-content-center align-items-center flex-column text-center">
    <h1 class="display-4 text-light">Liste des produits</h1>
    <ul class="list-group w-75">
        <?php foreach ($products as $product) : ?>
            <li class="list-group-item bg-dark text-light border-light">
                <h2><?php echo $product->getTitle(); ?></h2>
                <h3>Prix : <?php echo $product->getPrice(); ?> €</h3>
                <h4>Description : <?php echo $product->getDescription(); ?></h4>
                <h4>Status : <?php echo $product->getStatus(); ?></h4>

                <form method="post" action="http://localhost:8888/Eshop-au-top/delete-product" class="d-inline">
                    <input type="hidden" name="productId" value="<?php echo $product->getId(); ?>">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
