<?php

namespace App\Strecke;

use App\AbstractMVC\AbstractController;

class StreckenController extends AbstractController
{
    public function strecke(): void
    {

        //$notiz = $this->homeDatabase->getNotiz();
        //$laufwege = $this->homeDatabase->getLaufweg();
        $this ->pageLoad("Strecke", "strecke",['notiz' => null]);
    }
}