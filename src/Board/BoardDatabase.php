<?php

namespace App\Board;

use App\AbstractMVC\AbstractDatabase;
use App\AbstractMVC\AbstractModel;
use App\Board\Model\BoardModel;
use PDOException;
use PDO;
class BoardDatabase extends AbstractDatabase
{

    function getTable()
    {
        return "board";
    }

    function getModel()
    {
        return BoardModel::class;
    }
}