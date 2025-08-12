<?php

namespace App;
#[\AllowDynamicProperties]
class Router
{
    public function __construct(Container $container){
        $this->container = $container;
    }
    public function add($ctrl,$function): void
    {
        $container = $this->container->build($ctrl);
        $view = $function;
        $this ->build($container, $view);
    }
    public function build($container,$view): void
    {
        $container -> $view();
    }
}
