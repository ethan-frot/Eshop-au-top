<?php

class Order {

	public static $CART_STATUS = "CART";
	public static $SHIPPING_ADDRESS_SET_STATUS = "SHIPPING_ADDRESS_SET";
	public static $SHIPPING_METHOD_SET_STATUS = "SHIPPING_METHOD_SET";
	public static $PAID_STATUS = "PAID";
	public static $MAX_PRODUCTS_BY_ORDER = 5;
	public static $BLACKLISTED_CUSTOMERS = ['David Robert'];
	public static $AUTORIZED_SHIPPING_COUNTRIES = ['France', 'Belgique', 'Luxembourg'];
	public static $AVAILABLE_SHIPPING_METHODS = ['Chronopost Express', 'Point relais', 'Domicile'];
	public static $PAID_SHIPPING_METHOD = 'Chronopost Express';
	public static $PAID_SHIPPING_METHODS_COST = 5;

	private array $products;

	private string $customerName;

	private int $id;
	private DateTime $createdAt;

	private string $status;

	private ?string $shippingMethod;

	private ?string $shippingCity;

	private ?string $shippingAddress;

	private ?string $shippingCountry;

	public function __construct(string $customerName, array $products) {

		if (count($products) > Order::$MAX_PRODUCTS_BY_ORDER) {
			throw new Exception("Vous ne pouvez pas commander plus de " . Order::$MAX_PRODUCTS_BY_ORDER . " produits");
		}

		if (in_array($customerName, Order::$BLACKLISTED_CUSTOMERS)) {
			throw new Exception("Vous êtes blacklisté");
		}

		$this->status = Order::$CART_STATUS;
		$this->createdAt = new DateTime();
		$this->id = rand();
		$this->products = $products;
		$this->customerName = $customerName;
	}

	public function addProduct(Product $product): void {

		if ($this->isProductInCart($product)) {
			throw new Exception('Le produit existe déjà dans le panier');
		}

		if ($this->status === Order::$PAID_STATUS) {
			throw new Exception('Vous ne pouvez plus ajouter de produits');
		}

		if (count($this->products) >= Order::$MAX_PRODUCTS_BY_ORDER) {
			throw new Exception('Vous ne pouvez pas commander plus de ' . Order::$MAX_PRODUCTS_BY_ORDER .' produits');
		}

		$this->products[] = $product;
	}

	private function isProductInCart(Product $product): bool {
		return in_array($product, $this->products);
	}

	public function setShippingAddress(string $shippingCity, string $shippingAddress, string $shippingCountry): void {
		if ($this->status !== Order::$CART_STATUS) {
			throw new Exception(message: 'Vous ne pouvez plus modifier l\'adresse de livraison');
		}

		if (!in_array($shippingCountry, Order::$AUTORIZED_SHIPPING_COUNTRIES)) {
			throw new Exception(message: 'Vous ne pouvez pas commander dans ce pays');
		}

		$this->shippingAddress = $shippingAddress;
		$this->shippingCity = $shippingCity;
		$this->shippingCountry = $shippingCountry;
		$this->status = Order::$SHIPPING_ADDRESS_SET_STATUS;
	}

	public function setShippingMethod(string $shippingMethod): void {
		if ($this->status !== Order::$SHIPPING_ADDRESS_SET_STATUS) {
			throw new Exception(message: 'Vous ne pouvez pas choisir de méthode avant d\'avoir renseigné votre adresse');
		}

		if (!in_array($shippingMethod, Order::$AVAILABLE_SHIPPING_METHODS)) {
			throw new Exception(message: 'Méthode non valide');
		}

		$this->shippingMethod = $shippingMethod;
		$this->status = Order::$SHIPPING_METHOD_SET_STATUS;
	}

	public function pay(): void {
		if ($this->status !== Order::$SHIPPING_METHOD_SET_STATUS) {
			throw new Exception(message: 'Vous ne pouvez pas payer avant d\'avoir renseigné la méthode de livraison');
		}

		$this->status = Order::$PAID_STATUS;
	}

    public function getProducts(): array
    {
        return $this->products;
    }

}



