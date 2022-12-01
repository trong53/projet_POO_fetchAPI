<?php
namespace App\Models;

use App\Database\Database;

class HomeModel extends Database
{
    private const FILTER_PARAMS = [
        'all'           => "SELECT * FROM products",
        'female'        => "SELECT * FROM products WHERE genre = 'female'",
        'male'          => "SELECT * FROM products WHERE genre = 'male'",
        'price_ins'     => "SELECT * FROM products ORDER BY price",
        'price_des'     => "SELECT * FROM products ORDER BY price DESC"
    ];

    protected function countProductsByFilter(string $filter) : array {
        $query = self::FILTER_PARAMS[$filter]; 
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function getProductsByFilter(string $filter, INT $page, INT $articlesPerPage) : array {
        $query = self::FILTER_PARAMS[$filter].' LIMIT '.($articlesPerPage*($page-1)).','.$articlesPerPage; 
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}