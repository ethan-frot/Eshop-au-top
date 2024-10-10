<?php require_once('./order/view/partials/header.php'); ?>
	
	<main>
		<p>Payer la commande (c'est même pas débité sur votre compte. Ou peut être que si. Mais faites confiance) </p>

        <h3>Voici vos différents produits :</h3>
            <ul>
                <?php foreach ($products as $product): ?>
                    <li>
                        <p><?php echo htmlspecialchars($product->getTitle()); ?></p>
                        <p>Prix : <?php echo htmlspecialchars($product->getPrice()); ?> €</p>
                        <p>Description : <?php echo htmlspecialchars($product->getDescription()); ?></p>
                        <p>Status : <?php echo htmlspecialchars($product->getStatus()); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>


		<form method="POST" action="http://localhost:8888/esd-oop-php/process-payment">

			<label for="payment"></label>

			<button type="submit">Payer</button>

		</form>
	</main>

<?php require_once('./order/view/partials/footer.php'); ?>