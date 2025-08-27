<?php

namespace App\Track;

use App\AbstractMVC\AbstractController;

class TrackController extends AbstractController
{
    protected $trackDatabase= null;
    //
    public function __construct(TrackDatabase $trackDatabase){
        $this->trackDatabase = $trackDatabase;
    }
    public function track(): void
    {
        $strecken = $this->trackDatabase->getAll(1);
        $halte = $this->trackDatabase->getHaltestelle();
        $str = $this->trackDatabase->getStrecke();
        $this->pageLoad('Track','track',['halte'=>$halte,'str'=>$str,'strecken'=>$strecken]);
    }
}