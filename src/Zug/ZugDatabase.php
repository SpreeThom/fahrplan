<?php

namespace App\Zug;

use App\AbstractMVC\AbstractDatabase;
use App\Zug\Model\ZugModel;
use PDO;
class ZugDatabase extends AbstractDatabase
{

    function getTable()
    {
        return "zug";
    }

    function getModel()
    {
        return ZugModel::class;
    }
    function getZug():false|array
    {
        $table = $this->getTable();
        $model = $this->getModel();
        if (!empty($this -> pdo)){
            $stmt = $this -> pdo -> prepare("SELECT * FROM $table");
            $stmt -> execute();
            $stmt -> setFetchMode(PDO::FETCH_CLASS, $model);
            $data = $stmt -> fetchAll(PDO::FETCH_CLASS);
        }else{
            $data= false;
        }
        return $data;
    }
}