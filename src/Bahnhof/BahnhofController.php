<?php

namespace App\Bahnhof;

use App\AbstractMVC\AbstractController;

class BahnhofController extends AbstractController
{
    /**
     * @var BahnhofDatabase|null
     */
    protected $bahnhofDatabase = null;
    protected $suche ='';
    protected int $zugid=0;

    public function __construct(BahnhofDatabase $bahnhofDatabase){
        $this->bahnhofDatabase = $bahnhofDatabase;
    }
    public function bahnhof():void{
        //
        $checkL = isset($_POST['loadID']) ? 1 : 0;
        if((!empty($_POST['zugID'])) and (!empty($_POST['halteID'])))
        {
            $z_id = intval( $this->sanitizeData($_POST['zugID']));
            $h_id = intval( $this->sanitizeData($_POST['halteID']));
            $folge = intval( $this->sanitizeData($_POST['rfolge']));
            $_ank = $_POST['ank'];
            if($_ank == "" || (empty($_ank))){
                $_ank = "-";
            }else{
                $_ank = $this->sanitizeData($_POST['ank']);
            }
           $_abf = $_POST['abf'];
            if($_abf == "" || (empty($_abf))){
                $_abf = "-";
            }else{
                $_abf = $this->sanitizeData($_POST['abf']);
            }
            $this -> bahnhofDatabase ->insertFahrplan($z_id,$h_id,$folge,$_ank,$_abf);
            $this->setZugid($z_id);

        }elseif((!empty($_POST['theID'])) and ($checkL) ){
            $this->setZugid($_POST['theID']);

        }elseif(!empty($_POST['zugID'])){
            $this->setZugid($_POST['zugID']);
        }else{
            $this->setZugid(0);
        }
        if(!empty($_POST['bhfName'])){
            $bhfName =$this ->sanitizeData($_POST['bhfName']);
            if(empty($_post['h_nummer'])){
                $bhfNummer = 800;
            }else{
                $bhfNummer =$this ->sanitizeData($_POST['h_nummer']);
            }
            $this -> bahnhofDatabase ->insertBahnhof($bhfName,$bhfNummer);
        }
        if(!empty($_POST['bhfsearch'])){
                $bhfsearch =$this ->sanitizeData($_POST['bhfsearch']);
                $this->suche =$this ->bahnhofDatabase ->searchBahnhof($bhfsearch);
        }else{
            $this->suche  = null;
        }
        $bahnhof = $this ->bahnhofDatabase ->getHaltestelle();
        $fahrplan= $this->bahnhofDatabase->abfrageFahrplan($this->zugid);
        $this -> pageLoad('Bahnhof','bahnhof',['bahnhof' => $bahnhof,'suche'=> $this->suche,'fahrplan'=>$fahrplan]);
    }
    private function sanitizeData($data):string{
        if(empty($data)){
            var_dump('bin hier');
            exit();
        }
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    protected function setZugid(int $zugid): void
    {
        $this->zugid = $zugid;
    }
}