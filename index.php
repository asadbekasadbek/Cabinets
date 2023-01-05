<?php


use Controllers\HomeControllers;
use Routes\Route;

require_once "Routes/Route.php";
require_once "Controllers/HomeControllers.php";


$route =new Route();

$route->router('/',function (){
   HomeControllers::index();
});






$action = $_SERVER['REQUEST_URI'];
$route->dispath($action);
