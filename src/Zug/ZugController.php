<?php
/**
 * class für das Eintragen der Züge
 */
namespace App\Zug;

use App\AbstractMVC\AbstractController;

class ZugController extends AbstractController
{
    protected $zugDatabase = null;
    public function __construct(ZugDatabase $zugDatabase){
        $this->zugDatabase = $zugDatabase;
    }
    //
    public function zug():void{

        $this -> pageLoad("Zug","zug",[]);
    }
}