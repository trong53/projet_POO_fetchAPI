<?php
namespace App\Models;

use App\Database\Database;

class ArticleModel extends Database
{
    protected function getOne(INT $id) : array|bool {
        
        $statement = $this->connection->prepare("SELECT * FROM products WHERE id = ?");
        $statement -> bindparam(1, $id, \PDO::PARAM_INT);
        $statement->execute();
        $product = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($product) {
            return $product;
        }else{
            return false;
        }
    }

    // protected function getMany(array $idRange) : array|bool {
    //     $query = "SELECT * FROM products WHERE id IN (";
    //     foreach($idRange as $item) {
    //             $query .= intval($item) .',';
    //     }
    //     $query = trim($query,',') . ')';

    //     $statement = $this->connection->prepare($query);
    //     $statement->execute();
    //     $product = $statement->fetchAll(\PDO::FETCH_ASSOC);
    //     if ($product) {
    //         return $product;
    //     }else{
    //         return false;
    //     }
    // }
}
