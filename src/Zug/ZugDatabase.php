<?php

namespace App\Zug;

use App\AbstractMVC\AbstractDatabase;
use App\Zug\Model\ZugModel;

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
}