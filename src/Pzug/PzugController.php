<?php

namespace App\Pzug;

use App\AbstractMVC\AbstractController;
class PzugController extends AbstractController
{
    protected $pzugDatabase = null;
    public function __construct(PzugDatabase $pzugDatabase){
        $this->pzugDatabase = $pzugDatabase;
    }
    public function pzug():void{
        if(!empty($_POST['bhfOrt'])){
           $bhfOrt = $this -> sanitizeData($_POST['bhfOrt']);
           $this->pzugDatabase->insertPersonenBahnhof($bhfOrt);
        }
        $this ->pageLoad("Pzug","pzug",[]);
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