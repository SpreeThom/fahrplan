<?php

namespace App\Station;

use App\AbstractMVC\AbstractController;

class StationsController extends AbstractController
{
    public mixed $suche = null;
    protected $stationsDataBase=null;
    protected int $zugID=0;
    public function __construct(StationsDatabase $stationDataBase)
    {
        $this -> stationsDataBase = $stationDataBase;
    }

    public function station():void{
        if(!empty($_POST['statSearch'])){
            $StatSearch = $this->sanitizeData($_POST['statSearch']);
            $this->suche = $this->stationsDataBase->searchHaltestelle($StatSearch);
        }
        if(!empty($_POST['statName'])){
            $stationName = $this->sanitizeData($_POST['statName']);
            $this -> stationsDataBase -> setHaltestelle($stationName);
        }
        if((!empty($_POST['idZug'])) and (!empty($_POST['idStat']))) {
            $idZug = intval($this ->sanitizeData($_POST['idZug']));
            $idStat = intval($this ->sanitizeData($_POST['idStat']));
            $sfolge = intval($this ->sanitizeData($_POST['sfolge']));
                $this->setZugID($idZug);
                $ank =($_POST['ank']);
                    if($ank=="" || (empty($ank))) {
                        $ank = "-";
                    }else{
                        $ank=$this ->sanitizeData($ank);
                    }
                $abf =($_POST['abf']);
                    if($abf=="" || (empty($abf))) {
                        $abf = "-";
                    }else{
                        $abf=$this ->sanitizeData($abf);
                    }

           $this ->stationsDataBase->insertTimetable($idZug,$idStat,$sfolge,$ank,$abf);

        }
        $timetable =  $this ->stationsDataBase->getTimeTable($this->getZugID());
        $this->pageLoad("Station",'station',['timetable'=>$timetable,'suche'=>$this->suche]);
    }

    private function sanitizeData($data):string{
        if(empty($data)){
            // $this->setError("Es wurde keine Daten angegeben!");
            exit();
        }
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    public function getZugID(): int
    {
        return $this->zugID;
    }

    public function setZugID(int $zugID): void
    {
        if(!$zugID > 0){
            $zugID = 0;
        }
        $this->zugID = $zugID;
    }
}