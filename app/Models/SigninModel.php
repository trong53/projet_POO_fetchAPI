<?php
namespace App\Models;

use App\Database\Database;

class SigninModel extends Database
{
    public function getUserByEmail(string $email) : array|bool {
    
        $statement = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        $statement -> bindparam(1, $email);
        $statement->execute();
        $user = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if ($user) {
            return $user[0];
        }else{
            return false;
        }
    }
}