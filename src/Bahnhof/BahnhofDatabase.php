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

    public function insertBahnhof($haltestelle,$reihe):void
    {
        try{
            if(!empty($reihe)){
                $reihe = floatval($reihe);
                $reihe = sprintf("%.2f",$reihe);
                var_dump($reihe);
            }else{
                $reihe = 0;
            }
            if(!empty($this->pdo)){
                $id_echeck = $this->pdo->prepare("SELECT `name` FROM db_399097_24.haltestelle 
                                                            WHERE `name` = :haltestelle; ");
                $id_echeck->execute(['haltestelle' => $haltestelle]);
                $check = $id_echeck->fetch(PDO::FETCH_ASSOC);
                    if(isset($check['name'])){
                        header("location: /bahnhof");
                        exit();
                    }else{
                        $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.haltestelle (`name`,`reihe`) VALUES (:name,:reihe);");
                        $stmt -> execute(params: ['name' => $haltestelle,
                                                  'reihe' => $reihe]);
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

    /**
     * @param $term
     * @return bool
     */
    public function searchBahnhof($term): null|array
    {
        $table = $this->getTable();
        $model = $this->getModel();
        $dataBhf = null;
        if(!empty($this->pdo)){
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE name LIKE :term; ");
            $stmt->execute(['term' => $term.'%']);
           //$dataBhf = $stmt->setFetchMode(PDO::FETCH_CLASS);
            while($row = $stmt->fetchALL(PDO::FETCH_ASSOC)){
                $dataBhf = $row;
            }
        }
        return $dataBhf;
    }
}