<?php require_once('./order/view/partials/header.php'); ?>

<main class="d-flex justify-content-center align-items-center flex-column text-center">
    <h1 class="display-4 text-danger">Erreur</h1>
    <p class="lead">Il y a eu une erreur : <?php echo $errorMessage; ?></p>
    <a href="http://localhost:8888/esd-oop-php/" class="btn btn-primary">Retour à l'accueil</a>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
