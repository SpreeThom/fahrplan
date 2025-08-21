<?php

namespace App\Zug;

use App\AbstractMVC\AbstractDatabase;
use App\Zug\Model\ZugModel;
use PDO;
use PDOException;

class ZugDatabase extends AbstractDatabase
{

    function getTable()
    {
        return "zug";
    }

    function getModel()
    {
        return ZugModel::class;
    }
    function getZug():false|array
    {
        $table = $this->getTable();
        $model = $this->getModel();
        if (!empty($this -> pdo)){
            $stmt = $this -> pdo -> prepare("SELECT * FROM $table");
            $stmt -> execute();
            $stmt -> setFetchMode(PDO::FETCH_CLASS, $model);
            $data = $stmt -> fetchAll(PDO::FETCH_CLASS);
        }else{
            $data= false;
        }
        return $data;
    }
    function getIntern():false|array
    {
        if (!empty($this -> pdo)){
            $stmt = $this -> pdo -> prepare("SELECT * FROM db_399097_24.intern");
            $stmt -> execute();
            $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }else{
            $data= false;
        }
        return $data;

    }
    /**
     * @param $nr
     * @param $mg
     * @param $jahr
     * @param $lw
     * @return bool
     */
    function insertZug($nr, $mg, $jahr, $lw):bool
    {
        $b=true;
        try {
          if($this->equalTableZug($nr,$jahr)){
              $b=false;
          }else {
              if (!empty($this->pdo)) {
                  $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.zug (zug_nr,zug_mg,zug_jahr,zug_lw)
                                            VALUES (:nr,:mg,:jahr,:lw)");
                  $stmt->execute([
                      ":nr" => $nr,
                      ":mg" => $mg,
                      ":jahr" => $jahr,
                      ":lw" => $lw
                  ]);
              }
          }
        } catch (PDOException $e) {
           header("Location /zug");

            exit();
        }
            return $b;
    }

    /**
     * @param $jahr
     * @param $fpljahr
     * @param $gattung
     * @param $lw
     * @param $tage
     * @param $verkehrtnicht
     * @param $intern
     * @param $mitropa
     * @param $bar
     * @param $zid
     * @return bool
     */
    function insertIntern($jahr, $fpljahr, $gattung, $lw, $tage, $verkehrtnicht, $intern, $mitropa, $bar, $zid):bool
    {
        if (!empty($this->pdo)) {
            $stmt = $this->pdo->prepare("INSERT INTO db_399097_24.intern
            (i_jahr, i_fpljahr, i_gattung, i_lw, i_tage, i_verkehrtnicht,i_intern, i_mitropa, i_bar, zugId)
               values(:jahr,:fpljahr,:gattung,:lw,:tage,:verkehrtnicht,:intern,:mitropa,:bar,:zid)");
                $stmt->execute([
                'jahr' => $jahr,
                'fpljahr' => $fpljahr,
                'gattung' => $gattung,
                'lw' => $lw,
                'tage' => $tage,
                'verkehrtnicht' => $verkehrtnicht,
                'intern' => $intern,
                'mitropa' => $mitropa,
                'bar' => $bar,
                'zid' => $zid
            ]);
        }
        return true;
    }

    /**
     * @param $znr
     * @param $mg
     * @param $jahr
     * @param $lw
     * @param $upid
     * @return bool
     */
    function setUpdateZug($znr, $mg, $jahr, $lw, $upid):bool
    {
        if (!empty($this->pdo)) {
            $znr = intval($znr);
            $jahr = intval($jahr);
            $upid = intval($upid);
            $stmt = $this->pdo->prepare(/** @lang text */ "UPDATE db_399097_24.zug SET zug_nr ='$znr',zug_mg ='$mg',zug_jahr ='$jahr',zug_lw ='$lw'
                                            WHERE zug_id = '$upid' ");
            $stmt->execute();
        }
        return true;
    }
     protected function equalTableZug($nr,$jahr):bool
     {
         $b=false;
         $id_check = $this->pdo->prepare("SELECT `zug_nr` FROM db_399097_24.zug WHERE `zug_nr` = :nummer; ");
         $id_check->execute([':nummer' => $nr]);
         $checkNr = $id_check->fetch(PDO::FETCH_ASSOC);
         $id_check_J = $this->pdo->prepare("SELECT `zug_jahr` FROM db_399097_24.zug WHERE `zug_jahr` = :jahr; ");
         $id_check_J->execute([':jahr' => $jahr]);
         $checkJahr = $id_check_J->fetch(PDO::FETCH_ASSOC);
         if($checkNr && $checkJahr){
            $b=true;
         }
         return $b;
     }
}