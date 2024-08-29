<?php

namespace App\Models;

use App\Models\Product;

class Dvd extends Product
{
    public function __construct($sku, $name, $price, protected float $size)
    {
        parent::__construct($sku, $name, $price, "dvd");
    }

    public function getData(): array
    {
        return [
            'sku' => $this->sku, 
            'name' => $this->name, 
            'price'=> $this->price,
            'size'=> $this->size
        ];
    }

    public static function getAll() : array
    {
        return Product::findAll('dvd');
    }
}