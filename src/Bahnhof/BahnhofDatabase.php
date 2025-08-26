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
                        header("location: /bahnhof");
                        exit();
                    }else{
                        $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.haltestelle (`name`) VALUES (:name);");
                        $stmt -> execute(params: ['name' => $haltestelle]);
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
     * @return null|array
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
    function insertFahrplan(int $zugid,int $halteid,int $reihe,$ankunft,$abfahrt):bool
    {
        try {

                if(!empty($this->pdo)){
                    $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.fahrplan (z_id, halte_id,reihe, ankunft, abfahrt) 
                                             VALUES (:zugid,:halteid,:reihe,:ankunft,:abfahrt)");
                    $stmt ->execute([
                            ":zugid" => $zugid,
                            ":halteid" => $halteid,
                            ":reihe" => $reihe,
                            ":ankunft" => $ankunft,
                            ":abfahrt" => $abfahrt
                    ]);
                }


        }catch (PDOException $e){
            header("Location /bahnhof");
            exit();
        }
        return true;
    }
    public function abfrageFahrplan(int $zugid):array|null{
        $data=null;
        try {
            if (!empty($this->pdo)){
                $stmt = $this->pdo->prepare("SELECT z.zug_mg AS zug, h.name AS bahnhof,f.id,f.reihe, f.Ankunft,f.Abfahrt
                                            FROM db_399097_24.fahrplan f JOIN db_399097_24.zug z on z_id = z.zug_id 
                                            join db_399097_24.haltestelle h on f.halte_id = h.id 
                                            where z.zug_id = $zugid order by f.reihe ");
                $stmt ->execute();
                $data = $stmt->fetchAll();
            }
        }catch (PDOException $ex){

        }
        return $data;
    }
}