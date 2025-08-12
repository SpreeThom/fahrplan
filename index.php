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