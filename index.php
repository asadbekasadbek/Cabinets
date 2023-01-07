<?php


use Controllers\Auth\LogoutControllers;
use Controllers\Auth\SigninControllers;
use Controllers\Auth\SignupControllers;
use Controllers\HomeControllers;
use Controllers\SendMail;
use Routes\Route;

session_start();
error_reporting(E_ALL);
date_default_timezone_set('Asia/Tashkent');

require_once "Routes/Route.php";
require_once "Controllers/HomeControllers.php";
require_once "Models/ConnectDB.php";
require_once "Controllers/Auth/SignupControllers.php";
require_once "Controllers/Auth/SigninControllers.php";
require_once "Controllers/Auth/LogoutControllers.php";
require_once "Controllers/SendMail.php";

$route = new Route();
//начальная страница
$route->router('/', function () {
    HomeControllers::index();
});

//страница регистрации
$route->router('/register', function () {
    require_once "Views/register.php";
});
//страница который проверяет на регистрацию
$route->router('/signup', function () {
    SignupControllers::signup();
});
//страница профиля которые можно забронировать кабинет
$route->router('/profile', function () {
    include "Views/profile.php";
});
//страница который проверяет на авторизация
$route->router('/signin', function () {
    SigninControllers::singnin();
});
//страница который очищает куки и отменяет авторизацию
$route->router('/logout', function () {
    LogoutControllers::logout();
});
$route->router('/send_message', function () {
    SendMail::sendMail();
});


//Это чистый метод тестирования, поэтому вам не нужно вручную заполнять базу данных cabinets  .
//$route->router('/cabinets',function (){
//
//    $connect = new ConnectDB();
//    $connect =$connect->connectDB();
//
//    $sql1 = "TRUNCATE cabinets;";
//    $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
//    $i=1;
//    while ($i<6){
//        $sql2 = "INSERT INTO `cabinets` (`id`, `number_cabinet`) VALUES (NULL, '$i');";
//        $connect->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
//        $i++;
//    }
//    echo "success";
//});

//Это чистый метод тестирования, поэтому вам не нужно вручную заполнять базу данных free_cabinets  .
//$route->router('/free_cabinets',function (){
//    $connect = new ConnectDB();
//    $connect =$connect->connectDB();
//
//    $sql1 = "TRUNCATE free_cabinets;";
//    $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
//    $i = 0;
//    while ($i<8)
//    {
//        $begin = new DateTime ('9:00:00');
//        $begin->modify('+'.$i.' day');
//        $end = new DateTime( '18:00:00');
//        $end->modify('+'.$i.' day');
//        $week=date('w',$begin->getTimestamp());
//        if ($week!='6' && $week!='0'){
//            $interval = new DateInterval('PT60M');
//            $daterange = new DatePeriod($begin, $interval ,$end);
//            $sql2 = "SELECT * FROM `cabinets`";
//            $cabinets = $connect->query($sql2)->fetchAll(PDO::FETCH_ASSOC);;
//            foreach ($cabinets as $cabinet ){
//                foreach ($daterange as $date) {
//                        $number_cabinet= $cabinet['number_cabinet'];
//                        $start_booking_cabinet =date('d-m-Y  h:m:s',$date->getTimestamp());
//                        $end_cabinet_booking =new DateTime ($start_booking_cabinet);
//                        $end_cabinet_booking->modify('+1 hour');
//                        $end_cabinet_booking =date('d-m-Y  G:m:s',$end_cabinet_booking->getTimestamp());
//                    $sql2 = "INSERT INTO `free_cabinets` (`id`, `start_booking_cabinet`, `end_cabinet_booking`,`number_cabinet`) VALUES (NULL, '$start_booking_cabinet','$end_cabinet_booking','$number_cabinet');";
//                    $connect->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
//
//                }
//            }
//        }
//
//        $i++;
//    }
//    echo "success";
//});


$action = $_SERVER['REQUEST_URI'];
$route->dispath($action);
