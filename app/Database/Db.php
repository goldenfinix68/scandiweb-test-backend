<?php

namespace App\Database;

class Db
{
    private \PDO $connection;
    private static Db | null $instance = null;
  
    public function __construct()
    {
        $host = $_ENV['DB_HOSTNAME'];
        $user = $_ENV['DB_USERNAME'];
        $db = $_ENV['DB_NAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $this->connection = new \PDO("mysql:host=$host;dbname=$db", $user, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\Exception $e) {
            http_response_code(500);
            die('DB connection error ' . $e->getMessage());
        }
    }

    public static function getConnection(): \PDO
    {
        if(!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance->connection;
    }
}