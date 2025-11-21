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
        $this ->pageLoad("Pzug","pzug",[]);
    }
}