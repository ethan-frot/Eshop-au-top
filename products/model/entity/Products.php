<?php

class Products
{
    private int $id;
    
    private string $title;

    private float $price;

    private string $description;

    private bool $status;

    private DateTime $createdAt;

    public function __construct(string $title, float $price, string $description, bool $status)
    {
        $this->id = rand();
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->status = $status;
        $this->createdAt = new DateTime();
    }

}