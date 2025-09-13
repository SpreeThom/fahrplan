<?php

namespace App\Home;

use App\AbstractMVC\AbstractController;
class HomeController extends AbstractController
{
   protected $homeDatabase = null;
        public function __construct(HomeDatabase $homeDatabase){
            //$this->homeDatabase = $homeDatabase;
        }
        public function home(): void
        {

            //$notiz = $this->homeDatabase->getNotiz();
           //$laufwege = $this->homeDatabase->getLaufweg();
            $this ->pageLoad("Home", "home",['notiz' => null]);
        }
}