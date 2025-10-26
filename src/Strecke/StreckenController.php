<?php

namespace App\Strecke;

use App\AbstractMVC\AbstractController;

class StreckenController extends AbstractController
{
    protected $streckendatabase = null;
    public ?string $error = null;
    public function __construct(StreckenDatabase $streckendatabase){
        $this->streckendatabase = $streckendatabase;
    }
    public function strecke(): void
    {
        if((!empty($_POST['sID'])) and (!empty($_POST['sUpdate']))){
            $this -> UpdateStrecke();
        }elseif((!empty($_POST['sname'])) and (!empty($_POST['sbis']))) {
            $this -> streckeEintragen();
        }

        $streckedetail = $this->streckendatabase -> readStrecke();
        $this ->pageLoad("Strecke", "strecke",['notiz' => null,'streckedetail' => $streckedetail]);
    }
     function streckeEintragen(): void{
        $sname = $this -> sanitizeData($_POST["sname"]);
        $sbis = $this -> sanitizeData($_POST["sbis"]);
        $spic = $this -> sanitizeData($_POST["spic"]);
        $snotiz = $this -> sanitizeData($_POST["snotiz"]);
        $skm = $this -> sanitizeData($_POST["skm"]);
        $olkm = $this -> sanitizeData($_POST["olkm"]);
        $this -> streckendatabase -> eintragen($sname,$sbis,$spic,$snotiz,$skm,$olkm);
    }
    function UpdateStrecke():void{
        $s_id = intval($_POST['sID']);
        $sname = $this -> sanitizeData($_POST["sname"]);
        $sbis = $this -> sanitizeData($_POST["sbis"]);
        $spic = $this -> sanitizeData($_POST["spic"]);
        $snotiz = $this -> sanitizeData($_POST["snotiz"]);
        $skm = $this -> sanitizeData($_POST["skm"]);
        $olkm = $this -> sanitizeData($_POST["olkm"]);
        $this -> streckendatabase->update($s_id,$sname,$sbis,$spic,$snotiz,$skm,$olkm);
    }
    private function sanitizeData($data):string{
        if(empty($data)){
            $this->error="Es wurde keine Daten angegeben!";
            return $data;
        }
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}