<?php

namespace App;

 use App\Bahnhof\BahnhofController;
 use App\Bahnhof\BahnhofDatabase;
 use App\Core\DBinit;
 use App\Home\HomeController;
 use App\Home\HomeDatabase;
 use App\Zug\ZugController;
 use App\Zug\ZugDatabase;

 class Container{
    private array $instances =[];
    private array $builds;
    public function __construct(){
        //
        $this->builds = ['homeController'=> function(){
            return new HomeController($this->build('homeDatabase'));
        },
            "homeDatabase"=> function(){
                return new HomeDatabase($this->build('pdo'));
            },
            "zugController"=> function(){
                return new ZugController($this->build('zugDatabase'));
            },
            "zugDatabase"=> function(){
            return new ZugDatabase($this->build('pdo'));
            },
            "bahnhofController"=> function(){
            return new BahnhofController($this->build('bahnhofDatabase'));
            },
            "bahnhofDatabase"=> function(){
            return new BahnhofDatabase($this->build('pdo'));
            },
            'router' => function(){
                return new Router($this->build("container"));
        },
            "container" => function(){
                return new Container();
            },
            "pdo" => function(){
            $conn = new DBinit();
            return $conn -> getConnection();
            }

            ];
    }
    public function build($obj){
        if (isset($this->builds[$obj])){
            if (!empty($this->instances[$obj])){
                return $this->instances[$obj];
            }
            $this->instances[$obj] = $this->builds[$obj]();
        }
        return $this->instances[$obj];
    }
}
