<?php

namespace App\Home;

use App\AbstractMVC\AbstractDatabase;
use App\Home\Model\HomeModel;
use PDO;

class HomeDatabase extends AbstractDatabase
{
    public function getTable(): string
    {

    }
    public function getModel(): string
    {
         return HomeModel::class;
    }


}