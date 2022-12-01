<?php
namespace App\Database;

class Database {

    public $connection;

    public function __construct() {
        try {
            $this->connection = new \PDO(
                'mysql:host=' . CONFIG_DB['database']['host'] . ';dbname=' . CONFIG_DB['database']['dbname'] . ';charset=utf8',
                CONFIG_DB['database']['user'],
                CONFIG_DB['database']['password']
            );
        } catch(\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function createTable(string $table_name) : void {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS $table_name
                    (
                        id int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(255) NOT NULL,
                        email VARCHAR(500),
                        password VARCHAR(500),
                        created_at DATETIME default CURRENT_TIMESTAMP
                    )";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

        } catch(\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}