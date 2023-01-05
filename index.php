<?php

use Controllers\HomeControllers;
use Routes\Route;

require_once "Routes/Routes.php";
require_once "Controllers/HomeControllers.php";


$rout =new Route();

$rout->router('/',function (){
   HomeControllers::index();
});

$rout->router('/register',function (){

});




$action = $_SERVER['REQUEST_URI'];
$rout->dispath($action);
