<?php

namespace App;

use Bramus\Router\Router;

class App
{
    private static function setRoutes(): void
    {
        $router = new Router();
        $router->setNamespace('App\Controllers');
        $router->get('/', 'ProductController@getProducts');
        $router->post('/addProduct', 'ProductController@addProduct');
        $router->post('/deleteProducts', 'ProductController@deleteProducts');
        $router->run();
    }

    public static function run(): void
    {
        self::setRoutes();
    }
}