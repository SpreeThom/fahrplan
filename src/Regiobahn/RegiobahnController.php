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
        //
        $this -> pageLoad('Regiobahn',"regiobahn",[]);
    }
}