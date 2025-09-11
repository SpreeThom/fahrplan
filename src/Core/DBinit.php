<?php

namespace App\Core;
 use PDO;
 use PDOException;

 class DBinit
 {
     //private string $host = "pfeffi65.lima-db.de:3306";
     private string $host = "pfeffi65.lima-db.de:3306";
     private string $dbname = 'db_399097_24';
     /**
      * @var mixed|PDO|null
      */
     private mixed $connection;

     public function __construct()
     {
         try {
             $this->connection = new PDO (
                 dsn: "mysql:host={$this -> host}; dbname = $this->dbname ", username: "USER399097_plan", password: ""
             );
         } catch (PDOException $e) {
             echo $e->getMessage();
             $this->connection = null;
             exit;
         }

     }

     /**
      * @return mixed|PDO|null
      */
     public function getConnection(): mixed
     {
         return $this->connection;
     }
     public function closeConnection(){
         $this->connection = null;
     }
}