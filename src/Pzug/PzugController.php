<?php

namespace App\Pzug;

use App\AbstractMVC\AbstractController;
class PzugController extends AbstractController
{
    private int $_pzid = 0;
    public $pzFahrplan = null;
    protected $pzugDatabase = null;
    public function __construct(PzugDatabase $pzugDatabase){
        $this->pzugDatabase = $pzugDatabase;
    }
    public function pzug():void{
        if(!empty($_POST['bhfOrt'])){
           $bhfOrt = $this -> sanitizeData($_POST['bhfOrt']);
           $this->pzugDatabase->insertPersonenBahnhof($bhfOrt);
        }
        /** eintrag Fahrplan */
       if((!empty($_POST['pzbhf'])) and (!empty($_POST['pzugID']))){
           $pzugID = intval($this -> sanitizeData($_POST['pzugID']));
           $pzbhf = intval($this -> sanitizeData($_POST['pzbhf']));
           $pzfolge = intval($this -> sanitizeData($_POST['pzfolge']));
           if(empty($_POST['pzank'])){
               $ank = "- -";
           }else{
               $ank = $this -> sanitizeData($_POST['pzank']);
           }
           if(empty($_POST['pzabf'])){
               $abf = "- -";
           }else{
               $abf = $this -> sanitizeData($_POST['pzabf']);
           }
           $this->setPzid($pzugID);
          $this -> pzugDatabase -> insertFahrplan($pzugID, $pzbhf, $ank, $abf,$pzfolge);
       }

       if(!empty($this->getPzid())){
           $this->pzFahrplan = $this->pzugDatabase -> getfahrplan($this->getPzid());
       }
        $pZbahnhof = $this->pzugDatabase->getPersonenBahnhof();
        $this ->pageLoad("Pzug","pzug",['pZbahnhof'=>$pZbahnhof,'pID'=> $this->getPzid(),'pzFahrplan'=>$this->pzFahrplan]);
    }
    private function sanitizeData($data):string{
        if(empty($data)){
            $data = 0;
        }
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    public function getPzid(): int
    {
        return $this->_pzid;
    }

    public function setPzid(int $pzid): void
    {
        if(empty($pzid)){
            $pzid = 0;
        }
        $this->_pzid = $pzid;
    }
}