<?php

namespace App\Track;

use App\AbstractMVC\AbstractDatabase;
use App\Track\Model\TrackModel;
use PDO;
use PDOException;
class TrackDatabase extends AbstractDatabase
{

    function getTable()
    {
        return "strecken";
    }

    function getModel()
    {
       return TrackModel::class;
    }
     function getHaltestelle():null|array
    {
        $data = null;
        try {
           if(!empty($this->pdo)){
               $stmt = $this->pdo->prepare("SELECT * FROM db_399097_24.haltestelle");
               $stmt->execute();
               $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
           }
        }catch (PDOException $e) {
            //
        }
        return $data;
    }
    function getStrecke():null|array{
        $data = null;
        try {
           if(!empty($this->pdo)){
               $stmt = $this->pdo->prepare("SELECT * FROM db_399097_24.strecke");
               $stmt->execute();
               $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
           }
        }catch (PDOException $e) {
            //
        }
        return $data;
    }
    function getAll(int $s):null|array{
        $data = null;
        try {
            if(!empty($this->pdo)){
                $stmt = $this->pdo->prepare("SELECT h.name,h.id from db_399097_24.haltestelle h 
                              join db_399097_24.strecken st on h.id = st.h_id 
                               join db_399097_24.strecke s on st.s_id = s.str_id where s.str_id = $s ");
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch (PDOException $e) {
            //
            $data = null;
        }

        return $data;
    }
}