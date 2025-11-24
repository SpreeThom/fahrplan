<?php

namespace App\Pzug;

use App\AbstractMVC\AbstractDatabase;
use PDO;
use PDOException;

class PzugDatabase extends AbstractDatabase
{

    function getTable()
    {
        // TODO: Implement getTable() method.
    }

    function getModel()
    {
        // TODO: Implement getModel() method.
    }

    /**
     * @param string $_ort
     * @return void
     */
   final public function insertPersonenBahnhof(string $_ort): void
    {
        try{

            if(!empty($this->pdo)){
                $_check = $this->pdo->prepare("SELECT `b_name` FROM db_399097_24.bahnhof 
                                                            WHERE `b_name` = :ort; ");
                $_check -> execute(['ort' => $_ort]);
                $check = $_check -> fetch(PDO::FETCH_ASSOC);

                    if(isset($check['b_name'])){
                        var_dump($_ort.'falsch');
                        header("location: /pzug");

                    }else{
                        var_dump($_ort.'- richtig');
                        $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.bahnhof(`b_name`) VALUES (:b_name);");
                        $stmt-> execute(['b_name' => $_ort]);

                    }
            }
        }catch (PDOException $e){
            var_dump($e->getMessage());
            die();
        }
        var_dump($_ort.'-ende');
    }

}