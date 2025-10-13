<?php

namespace App\Station;

use App\AbstractMVC\AbstractDatabase;
use PDO;
use PDOException;

class StationsDatabase extends AbstractDatabase
{

    function getTable()
    {
        // TODO: Implement getTable() method.
    }

    function getModel()
    {
        // TODO: Implement getModel() method.
    }
    public function insertTimetable($_zugid,$_haltestelle,$_reihenfolge,$_ank,$_abf):void
    {
        try{
            if(!empty($this->pdo)){
                $stmt = $this -> pdo -> prepare("INSERT INTO db_399097_24.timetable(z_id,station_id,ankunft,abfahrt,reihe)
                                                VALUES (:z_id,:station_id,:ank,:abf,:reihe)");
                $stmt ->execute([
                    ":z_id" => $_zugid,
                    ":station_id" => $_haltestelle,
                    ":ank" => $_ank,
                    ":abf" => $_abf,
                    ":reihe" => $_reihenfolge
                ]);
            }
        }catch(PDOException $e){
            header("Location /fahrplan");
            var_dump($e->getMessage());
           // exit();
    }
  }
  public function getTimeTable($_zugID):array|null{
      $data = null;
      try{
          if(!empty($this->pdo)){
              $stmt = $this -> pdo -> prepare("SELECT z.zug_mg AS zug, s.name AS station, t.id,t.reihe,t.ankunft,t.abfahrt
                                                FROM db_399097_24.timetable t JOIN db_399097_24.zug z on z_id = z.zug_id
                                                    JOIN db_399097_24.station s on s.id = t.station_id
                                                    WHERE z.zug_id =$_zugID order by t.reihe");
              $stmt ->execute();
              $data = $stmt ->fetchAll();
          }
      }catch(PDOException $e){

          exit();
      }
      return $data;
  }
}