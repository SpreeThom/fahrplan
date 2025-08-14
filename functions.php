<?php
/**
 *
 */
require_once __DIR__ . '/autoload.php';

use App\Container;
$container = new Container();
//
include __DIR__ . '/fileHelper.php';

function get_header ( $name = null):void
{
    $name = (string) $name;
    if('' !== $name) {
        $template = sprintf("/header-%s.php", $name);
    }else{
        $template = "/header.php";
    }
    $obj= ['FileHelper','load_header'];
    call_user_func($obj,$template);
}
function get_footer($name = null):void{
    $name = (string) $name;
    if('' !== $name) {
        $template = sprintf("/footer-%s.php", $name);
    }else{
        $template = "/footer.php";
    }
    $obj= ['FileHelper','load_footer'];
    call_user_func($obj,$template);
}
function baseUrl():string{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $new = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $position = strrpos($new, "/");
    $wort = '/fahrplan';
    if ($position !== false) {
        $newString = substr($new, 0, $position);
    }
    if(str_ends_with($newString, $wort)) {
        $newString= $new;
    }else{
        $newString = $newString.'/fahrplan';
    }
    return $newString;
}
