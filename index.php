<?php


use Routes\Route;

require_once "Routes/Route.php";



$route =new Route();

$route->router('/',function (){
   return "test 4";
});






$action = $_SERVER['REQUEST_URI'];
$route->dispath($action);
