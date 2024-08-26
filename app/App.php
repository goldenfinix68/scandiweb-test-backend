<?php

namespace App;

use Dotenv\Dotenv;
use Bramus\Router\Router;

class App
{
    private static function loadEnvironmentVariables(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->safeLoad();
    }

    private static function setRoutes(): void
    {
        $router = new Router();
        $router->setNamespace('App\Controllers');
        $router->get('/api', 'ProductController@getProducts');
        $router->post('/api/addProduct', 'ProductController@addProduct');
        $router->post('/api/deleteProducts', 'ProductController@deleteProducts');
        $router->run();
    }

    public static function run(): void
    {
        self::loadEnvironmentVariables();
        self::setRoutes();
    }
}