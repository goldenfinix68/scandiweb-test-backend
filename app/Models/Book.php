<?php

namespace App\Models;

use App\Models\Product;

class Book extends Product
{
    public function __construct($sku, $name, $price, protected float $weight)
    {
        parent::__construct($sku, $name, $price, "book");
    }

    public function getData(): array
    {
        return [
            'sku' => $this->sku, 
            'name' => $this->name, 
            'price'=> $this->price,
            'weight'=> $this->weight
        ];
    }

    public static function getAll() : array
    {
        return Product::findAll('book');
    }
}