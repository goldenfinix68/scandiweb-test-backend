<?php

namespace App\Controllers;

class ProductController
{
    public static function getProducts(): void
    {
        http_response_code(200);
        echo "Get products";
    }

    public static function addProduct(): void
    {
        http_response_code(200);
        echo "Add product";
    }

    public static function deleteProducts(): void
    {
        http_response_code(200);
        echo "Delete products";
    }
}