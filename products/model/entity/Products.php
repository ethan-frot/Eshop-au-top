<?php

class Products
{
    private int $id;
    
    private string $title;

    private float $price;

    private string $description;

    private bool $status;

    private DateTime $createdAt;

    public function __construct(string $title, float $price, bool $status, string $description)
    {
        $this->id = rand();
        $this->title = $title;
        $this->price = $price ? $price : 2;
        $this->description = $description;
        $this->status = $status ? $status : false;
        $this->createdAt = new DateTime();
    }

}