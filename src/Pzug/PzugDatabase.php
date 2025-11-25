<?php

namespace App\Pzug;

use App\AbstractMVC\AbstractDatabase;
use App\Pzug\Model\PzugModel;
use PDO;
use PDOException;

class PzugDatabase extends AbstractDatabase
{

    /**
     * @return string
     */
    function getTable(): string
    {
        return 'bahnhof';
    }

    /**
     * @return string
     */
    function getModel(): string
    {
        return PzugModel::class;
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
                        header("location: /pzug");
                    }else{
                        $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.bahnhof(`b_name`) VALUES (:b_name);");
                        $stmt-> execute(['b_name' => $_ort]);
                    }
            }
        }catch (PDOException $e){
            var_dump($e->getMessage());
        }
    }
    public function getPersonenBahnhof():array|null{
       $data = null;
       $table = $this->getTable();
       $model = $this->getModel();
       try{
         if(!empty($this->pdo)){
             $stmt = $this->pdo->prepare("SELECT * FROM db_399097_24.$table");
             $stmt-> execute();
             $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
             $data = $stmt->fetchAll();
         }
       }catch(PDOException $e){
           var_dump($e->getMessage());
           $data = null;
       }
       return $data;
}

    /**
     * @param int $zugId
     * @param int $bhf
     * @param int $folge
     * @param string $an
     * @param string $abf
     */
    final public function insertFahrplan(int $zugId, int $bhf,  string $an, string $abf,int $folge):void{
        try{
           if(!empty($this->pdo)){
                $stmt = $this -> pdo -> prepare("INSERT INTO db_399097_24.ptable(pz_id, b_id, ankunft, abfahrt, reihe) 
                                                    VALUE (:zugid, :bhf, :an, :abf,:folge);");
                $stmt -> execute([
                    'zugid' => $zugId,
                    'bhf' => $bhf,
                    'an' => $an,
                    'abf' => $abf,
                    'folge' => $folge
                ]);
           }
        }catch (PDOException $e){
            var_dump($e->getMessage());

        }
    }

    /**
     * @param int $_id
     * @return false|array|null
     */
    public function getFahrplan(int $_id): false|array|null
    {
        $fpldata = null;
        try{
           if(!empty($this->pdo)){
               $stmt = $this -> pdo -> prepare("SELECT z.p_mg AS Zug,b.b_name AS Bahnhof,f.id,f.reihe,f.ankunft,f.abfahrt 
                                                        FROM db_399097_24.ptable f JOIN db_399097_24.pzug z ON pz_id = z.p_id
                                                        JOIN db_399097_24.bahnhof b ON f.b_id = b.id
                                                        WHERE z.p_id = $_id ORDER BY f.reihe;");
               $stmt -> execute();
               $fpldata = $stmt ->fetchAll();
           }
        }catch (PDOException $e){
            var_dump($e->getMessage());
        }
        return $fpldata;
    }
}