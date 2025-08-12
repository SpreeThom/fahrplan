<?php

namespace App\AbstractMVC;

USE PDO;
abstract class AbstractDatabase
{
    protected $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo){
        $this ->pdo = $pdo;
    }
    abstract function getTable();
    abstract function getModel();

    function get_Laufweg(){
         $table = $this->getTable();
         $model = $this->getModel();
         if(!empty($this->pdo)){
             $laufWeg = $this->pdo->prepare("SELECT * FROM timetable.laufweg");
             $laufWeg->execute();
             $laufWeg->setFetchMode(PDO::FETCH_CLASS, $model);
             $laufWegData = $laufWeg->fetch(PDO::FETCH_CLASS);
         }
         return $laufWegData;
    }






}