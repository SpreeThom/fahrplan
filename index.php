<?php
global $container;
require_once "functions.php";
/**
 *
 */
$router = $container->build('router');

$request = $_SERVER["PATH_INFO"] ?? $_SERVER["REQUEST_URI"];

if ($request == "/fahrplan/") {
    $router -> add("homeController","home");
}
elseif ($request == "/zug") {
    $router -> add("zugController","zug");
}
elseif ($request == "/bahnhof"){
    $router -> add("bahnhofController","bahnhof");
}elseif($request == "/timetable"){
    $router -> add("trackController","track");
}
elseif ($request == "/strecke"){
    $router -> add("streckenController","strecke");
}
elseif ($request == "/station"){
    $router -> add("stationsController","station");
}
elseif ($request == "/pzug"){
    $router -> add("pzugController","pzug");
}