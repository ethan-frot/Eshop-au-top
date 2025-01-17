<?php require_once('./common/view/partials/header.php'); ?>

<main class="d-flex justify-content-center align-items-center flex-column text-center">
    <h1 class="display-4">Payer la commande</h1>
    <p class="lead">C'est même pas débité sur votre compte. Ou peut-être que si. Mais faites confiance !</p>

        <h3>Voici vos différents produits :</h3>
        <ul class="list-group mb-4 ">
            <?php foreach ($order->getProducts() as $product): ?>
                <li class="list-group-item bg-dark text-light">
                    <h5><?php echo htmlspecialchars($product->getTitle()); ?></h5>
                    <p>Prix : <?php echo htmlspecialchars($product->getPrice()); ?> €</p>
                    <p>Description : <?php echo htmlspecialchars($product->getDescription()); ?></p>
                    <p>Status : <?php echo htmlspecialchars($product->getStatus()); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>

    <form method="POST" action="http://localhost:8888/Eshop-au-top/process-payment" class="text-center">
        <button type="submit" class="btn btn-primary">Payer</button>
    </form>
</main>

<?php require_once('./common/view/partials/footer.php'); ?>
