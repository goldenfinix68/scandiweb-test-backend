<?php

namespace App\Models;

use App\Database\Db;

abstract class Product
{
    public function __construct(
        protected string $sku,
        protected string $name,
        protected float $price,
        protected string $type,
    ) { }

    public function save(): void {
        $data = $this->getData();
        $table = $this->type;
        $pdo = Db::getConnection();
        $sqlValueString = join(', ', array_map(fn ($item) => ":" . $item, array_keys($data)));
        $sql = "INSERT INTO $table VALUES ($sqlValueString)";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }

    abstract protected function getData(): array;

    public static function findAll($type): array {
        $pdo = Db::getConnection();
        $sql = "SELECT * from $type";
        $statement = $pdo->query($sql);

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(fn ($p) => $p += ['type' => $type], $data);
    }

    abstract protected static function getAll() : array;

    public static function delete($type, $skus) : void {
        $pdo = Db::getConnection();
        $sqlValueString = join(', ', array_map(fn ($item) => "'$item'", $skus));
        $sql = "DELETE FROM $type WHERE sku IN ($sqlValueString)";

        $statement = $pdo->prepare($sql);
        $statement->execute();
    }
}