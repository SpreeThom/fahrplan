<?php

namespace App\Bahnhof;

use App\AbstractMVC\AbstractDatabase;
use App\Bahnhof\Model\BahnhofModel;
use PDO;
use PDOException;

class BahnhofDatabase extends AbstractDatabase
{

    /**
     * @return string
     */
    function getTable(): string
    {
        return 'haltestelle';
    }

    /**
     * @return string
     */
    function getModel(): string
    {
        return BahnhofModel::class;
    }

    public function insertBahnhof($haltestelle):void
    {
        try{
            if(!empty($this->pdo)){
                $id_echeck = $this->pdo->prepare("SELECT `name` FROM db_399097_24.haltestelle 
                                                            WHERE `name` = :haltestelle; ");
                $id_echeck->execute(['haltestelle' => $haltestelle]);
                $check = $id_echeck->fetch(PDO::FETCH_ASSOC);
                    if(isset($check['name'])){
                        exit();
                    }else{
                        $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.haltestelle (`name`) VALUES (:name);");
                        $stmt -> execute(['name' => $haltestelle]);
                    }
            }
        }catch (PDOException $e){

        }

    }
    public function getHaltestelle():false|array
    {
        $data =null;
        $table = $this->getTable();
        $model = $this->getModel();
            if(!empty($this->pdo)){
                $stmt = $this->pdo->prepare("SELECT * FROM `$table`");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
                $data = $stmt->fetchAll(PDO::FETCH_CLASS);
            }
        return $data;
    }
}