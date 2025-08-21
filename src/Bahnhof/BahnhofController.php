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
        $bahnhof = $this ->bahnhofDatabase ->getHaltestelle();
        $this -> pageLoad('Bahnhof','bahnhof',['bahnhof' =>$bahnhof]);
    }
}