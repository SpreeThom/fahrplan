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
        $checkB = isset($_POST['anz']) ? 1 : 0;
       if(!empty($_POST['searchStr'])){
           $_s = intval($_POST['searchStr']);
       }else{
           $_s = 0;
       }
       if($checkB == 1) {

           if (($_s > 0) and (!empty($_s))) {
               $strecken = $this->trackDatabase->getAll($_s);
           } else {
               $strecken = $this->trackDatabase->getAll(1);
           }
       }else{
           $strecken = null;
       }
       if((!empty($_POST['strID'])) and (!empty($_POST['halteID'])) and (!empty($_POST['folgeID']))) {
           $strid = intval($this->sanitizeData($_POST['strID']));
           $halteid = intval($this->sanitizeData($_POST['halteID']));
           $folgeid = intval($this->sanitizeData($_POST['folgeID']));
           //
           var_dump($strid,$halteid,$folgeid);
           $this->trackDatabase->insertAll($strid, $halteid, $folgeid);
       }
        $halte = $this->trackDatabase->getHaltestelle();
        $str = $this->trackDatabase->getStrecke();
        $this->pageLoad('Track','track',['halte'=>$halte,'str'=>$str,'strecken'=>$strecken]);
    }

    private function sanitizeData($data):string{
        if(empty($data)){
           // $this->setError("Es wurde keine Daten angegeben!");
            exit();
        }
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}