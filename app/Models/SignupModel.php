<?php
namespace App\Models;
use App\Database\Database;

class SignupModel extends Database
{
    public function validator(string $value, string $pattern) : bool {
    
        if (preg_match($pattern, trim($value))) {
            return true;
        }else{
            return false;
        }
    }

    public function createUserModel(string $name, string $email, string $password): void {
        try {
            date_default_timezone_set('Europe/Paris');
            $created_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO users (name, password, email, created_at) 
                    VALUES (?, ?, ?, ?)";
            $statement = $this->connection->prepare($query);
            $statement -> bindparam(1, $name, \PDO::PARAM_STR);
            $statement -> bindparam(2, $password);
            $statement -> bindparam(3, $email, \PDO::PARAM_STR);
            $statement -> bindparam(4, $created_at, \PDO::PARAM_STR);
            $statement->execute();

        } catch(\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function checkExist(string $fieldTochecked, string $param) : bool {
    
        $statement = $this->connection->prepare("SELECT * FROM users WHERE $fieldTochecked = ?");
        $statement -> bindparam(1, $param);
        $statement->execute();
        $exists = $statement->fetchColumn();  // either 1 or null
        
        if ($exists) {
            return true;
        }
        else {
            return false;
        }
    }
}