<?php

class Product
{
    public static $MIN_CHARACTERS_TITLE = 3;
    public static $MAX_CHARACTERS_TITLE = 100;
    public static $MIN_PRICE = 1;
    public static $MAX_PRICE = 500;
    public static $DEFAULT_PRICE = 2;
    public static $DEFAULT_STATUS = false;
    
    private string $title;

    private float $price;

    private string $description;

    private bool $status;

    public function __construct(string $title, float $price, string $description, ?bool $status )
    {
        $this->validateTitle($title);
        $this->validatePrice($price);

        $this->title = $title;
        $this->price = $price ?: Product::$DEFAULT_PRICE;
        $this->description = $description;
        $this->status = $status ?: Product::$DEFAULT_STATUS;
    }

    public function validateTitle($title): void
    {
        $titleLength = strlen($title);

        if ($titleLength < self::$MIN_CHARACTERS_TITLE || $titleLength > self::$MAX_CHARACTERS_TITLE) {
            throw new Exception("Le titre doit contenir entre " . self::$MIN_CHARACTERS_TITLE . " et " . self::$MAX_CHARACTERS_TITLE . " caractères.");
        }
    }

    public function validatePrice($price) {
        if ($price < self::$MIN_PRICE || $price > self::$MAX_PRICE) {
            throw new Exception("Le prix doit être compris entre " . self::$MIN_PRICE . " et " . self::$MAX_PRICE . " euros.");
        }
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