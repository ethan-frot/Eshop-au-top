<?php require_once('./order/view/partials/header.php'); ?>
<main>

		<form method="POST" action="http://localhost:8888/esd-oop-php/create-order">

			<label for="customerName">Nom du client</label>
			<input type="text" id="customerName" name="customerName" required>
			<br>

			<label for="product">Produit</label>

			<select id="product" name="products[]" multiple size="3">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product->getId(); ?>"><?php echo $product->getTitle(); ?></option>
                <?php endforeach; ?>
			</select>
			<br>

			<button type="submit">Ajouter</button>

		</form>

	</main>

<?php require_once('./order/view/partials/footer.php'); ?>