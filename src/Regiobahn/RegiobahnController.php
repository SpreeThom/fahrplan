<?php

namespace App\Regiobahn;

use App\AbstractMVC\AbstractController;
class RegiobahnController extends AbstractController
{
    protected $regiobahnDatabase = null;

    public function __construct(RegiobahnDatabase $regiobahnDatabase){
        $this->regiobahnDatabase = $regiobahnDatabase;
    }
    public function regiobahn():void{
        if((!empty($_POST['pzNr'])) and (!empty($_POST['strID']))){
            $pzNr = intval($this -> sanitizeData($_POST['pzNr']));
            $pzMg = $this -> sanitizeData($_POST['pzMg']);
            $pzLw = $this -> sanitizeData($_POST['pzLw']);
            $pzGt = $this -> sanitizeData($_POST['pzGt']);
            $pzUe = $this -> sanitizeData($_POST['pzUe']);
            $pzBis = $this -> sanitizeData($_POST['pzBis']);
            $strID = intval($this -> sanitizeData($_POST['strID']));
            $this -> regiobahnDatabase -> insertStrecke($pzNr,$pzMg,$pzLw,$pzGt,$pzBis,$pzUe,$strID);
        }
        $this -> pageLoad('Regiobahn',"regiobahn",[]);
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