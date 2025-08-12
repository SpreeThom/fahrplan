<?php

namespace App\AbstractMVC;

class AbstractController
{
    /**
     * @param $dir
     * @param $view
     * @param $args
     * @return void
     */
    public function pageLoad($dir, $view, $args): void
    {
        extract($args);
        require_once __DIR__ .  "/../$dir/views/$view.php";
    }
}