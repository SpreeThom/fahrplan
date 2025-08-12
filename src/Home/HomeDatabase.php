<?php

namespace App\Home;

use App\AbstractMVC\AbstractDatabase;
use App\Home\Model\HomeModel;
use PDO;

class HomeDatabase extends AbstractDatabase
{
    public function getTable(): string
    {
        return "notiz";
    }
    public function getModel(): string
    {
        return HomeModel::class;
    }
    function getNotiz():false|array{
        $table = $this->getTable();
        $model = $this->getModel();
        if(!empty($this->pdo)){
            $stmt = $this->pdo->prepare("SELECT * FROM $table");
            $stmt->execute();
            $stmt ->setFetchMode(PDO::FETCH_OBJ);
            $data = $stmt->fetchAll();
        }
        return $data;
    }

}