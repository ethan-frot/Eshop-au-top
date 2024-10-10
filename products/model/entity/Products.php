<?php

class Products
{
    private int $id;
    
    private string $title;

    private float $price;

    private string $description;

    private bool $status;

    private DateTime $createdAt;

    public function __construct(string $title, string $description)
    {
        $this->id = rand();
        $this->title = $title;
        $this->price = 2;
        $this->description = $description;
        $this->status = false;
        $this->createdAt = new DateTime();
    }

}