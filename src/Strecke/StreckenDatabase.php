<?php

namespace App\Strecke;

use App\AbstractMVC\AbstractDatabase;
use PDO;
use PDOException;

class StreckenDatabase extends AbstractDatabase
{

    function getTable()
    {
        // TODO: Implement getTable() method.
    }

    function getModel()
    {
        // TODO: Implement getModel() method.
    }
    public function eintragen($name,$bis,$pic,$picOl,$notiz,$km,$ol):bool{
        $b = true;
        try {
             if($this->equalStrecke($name,$bis)){
                 $b=false;
             } else{
                 if (!empty($this->pdo)){
                     $stmt = $this -> pdo -> prepare("INSERT INTO `db_399097_24`.strecke(name, str_kb, str_pic, str_olpic, str_no,str_km,str_kmol)
                                                             VALUES (:name, :kb, :pic, :olpic, :notiz, :km, :olmo)");
                     $stmt -> execute(params: [
                         ":name" => $name,
                         ":kb" => $bis,
                         ":pic" => $pic,
                         ":olpic" => $picOl,
                         ":notiz" => $notiz,
                         ":km" => $km,
                         ":olmo" => $ol
                     ]);
                 }
             }
        }catch(PDOException $e){
            $b = false;
        }
        return $b;
    }
    public function update($_id, $name, $bis, $pic, $olpic,$sNotiz,$km,$ol):bool{
        try {
          if(!empty($this->pdo)){
             $stmt= $this -> pdo->prepare("UPDATE `db_399097_24`.strecke set name='$name',str_kb='$bis',
                                                   str_pic='$pic',str_olpic='$olpic',str_no='$sNotiz',str_km='$km',str_kmol='$ol'  WHERE str_id='$_id'");
             $stmt -> execute();
          }
        }catch(PDOException $e){
            return false;
        }

        return true;
    }
    protected function equalStrecke($name,$bis):bool{
        $b = false;
        try{
            $n_ckeck = $this -> pdo -> prepare( "SELECT `name` FROM db_399097_24.strecke WHERE `name`=':name'" );
            $n_ckeck -> execute([':name'=> $name]);
            $checkName = $n_ckeck -> fetch(PDO::FETCH_ASSOC);
            $s_check = $this -> pdo ->prepare( "SELECT `str_kb` FROM db_399097_24.strecke WHERE `str_kb`=':bis' " );
            $s_check -> execute([':bis'=> $bis]);
            $checkS = $s_check -> fetch(PDO::FETCH_ASSOC);
            if($checkName && $checkS){
                $b = true;
            }
        }catch(\PDOException $e){
            return false;
        }
            return $b;
    }
}