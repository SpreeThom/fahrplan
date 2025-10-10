<?php

namespace App\Station;

use App\AbstractMVC\AbstractController;

class StationsController extends AbstractController
{
    protected $stationsDataBase=null;
    public function __construct(StationsDatabase $stationDataBase)
    {
        $this -> stationsDataBase = $stationDataBase;
    }

    public function station():void{
        $this->pageLoad("Station",'station',['']);
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
}