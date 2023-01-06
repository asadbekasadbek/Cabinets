<?php


use Controllers\Auth\LogoutControllers;
use Controllers\Auth\SigninControllers;
use Controllers\Auth\SignupControllers;
use Controllers\HomeControllers;
use Routes\Route;
session_start();
require_once "Routes/Route.php";
require_once "Controllers/HomeControllers.php";
require_once "Models/ConnectDB.php";
require_once "Controllers/Auth/SignupControllers.php";
require_once "Controllers/Auth/SigninControllers.php";
require_once "Controllers/Auth/LogoutControllers.php";


$route =new Route();

$route->router('/',function (){
     HomeControllers::index();
});

$route->router('/register',function (){
     require_once "Views/register.php";
});

$route->router('/signup',function (){
    SignupControllers::signup();
});

$route->router('/profile',function (){
    include "Views/profile.php";
});

$route->router('/signin',function (){
     SigninControllers::singnin();
});

$route->router('/logout',function (){
    LogoutControllers::logout();
});



$action = $_SERVER['REQUEST_URI'];
$route->dispath($action);
