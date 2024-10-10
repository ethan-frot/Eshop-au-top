<?php

class Product
{
    public static int $MIN_CHARACTERS_TITLE = 3;
    public static int $MAX_CHARACTERS_TITLE = 100;
    public static int $MIN_PRICE = 1;
    public static int $MAX_PRICE = 500;
    public static int $DEFAULT_PRICE = 2;
    public static string $DEFAULT_DESCRIPTION = "Aucune description.";
    public static bool $DEFAULT_STATUS = false;

    private int $id;

    private string $title;

    private float $price;

    private string $description;

    private bool $status;

    public function __construct(string $title, float $price, string $description, ?bool $status)
    {

        $this->id = rand();
        $this->validateTitle($title);
        $this->title = $title;
        $this->price = $price ?: Product::$DEFAULT_PRICE;
        $this->validatePrice($this->price);
        $this->description = $description ?: Product::$DEFAULT_DESCRIPTION;
        $this->status = $status ?: Product::$DEFAULT_STATUS;
    }

    public function validateTitle($title): void {
        $titleLength = strlen($title);

        if ($titleLength < self::$MIN_CHARACTERS_TITLE || $titleLength > self::$MAX_CHARACTERS_TITLE) {
            throw new Exception("Le titre doit contenir entre " . self::$MIN_CHARACTERS_TITLE . " et " . self::$MAX_CHARACTERS_TITLE . " caractères.");
        }
    }

    public function validatePrice($price): void {
        if ($price < self::$MIN_PRICE || $price > self::$MAX_PRICE) {
            throw new Exception("Le prix doit être compris entre " . self::$MIN_PRICE . " et " . self::$MAX_PRICE . " euros.");
        }
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getStatus(): string {
        return $this->status ? 'Actif' : 'Désactivé';
    }

}