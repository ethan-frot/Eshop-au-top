<?php

class Product
{
    public static $DEFAULT_PRICE = 2;
    public static $DEFAULT_STATUS = false;
    private int $id;
    
    private string $title;

    private float $price;

    private string $description;

    private bool $status;

    private DateTime $createdAt;

    public function __construct(string $title, float $price, string $description, ?bool $status )
    {
        $this->id = rand();
        $this->title = $title;
        $this->price = $price ?: Product::$DEFAULT_PRICE;
        $this->description = $description;
        $this->status = $status ?: Product::$DEFAULT_STATUS;
        $this->createdAt = new DateTime();
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