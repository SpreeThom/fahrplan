<?php

namespace App\Bahnhof;

use App\AbstractMVC\AbstractController;

class BahnhofController extends AbstractController
{
    /**
     * @var BahnhofDatabase|null
     */
    protected $bahnhofDatabase = null;

    public function __construct(BahnhofDatabase $bahnhofDatabase){
        $this->bahnhofDatabase = $bahnhofDatabase;
    }
    public function bahnhof():void{
        //
        $suche  = null;
        if(isset($_POST['bhfName'])){
            $bhfName =$this ->sanitizeData($_POST['bhfName']);
            $reihe =$this ->sanitizeData($_POST['bhfReihe']);
            $this -> bahnhofDatabase ->insertBahnhof($bhfName,$reihe);
        }
        if(isset($_POST['bhfsearch'])){
            $bhfsearch =$this ->sanitizeData($_POST['bhfsearch']);
            $suche =$this ->bahnhofDatabase ->searchBahnhof($bhfsearch);
        }
        //
        $bahnhof = $this ->bahnhofDatabase ->getHaltestelle();
        $this -> pageLoad('Bahnhof','bahnhof',['bahnhof' => $bahnhof,'suche'=> $suche]);
    }
    private function sanitizeData($data):string{
        if(empty($data)){
            exit();
        }
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}