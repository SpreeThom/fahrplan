<?php

namespace App;

 use App\Core\DBinit;
 use App\Home\HomeController;
 use App\Home\HomeDatabase;

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
