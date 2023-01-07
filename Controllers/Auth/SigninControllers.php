<?php

namespace Controllers\Auth;

use Controllers\Cabinets;
use Models\ConnectDB;
use PDO;

require_once "Models/ConnectDB.php";
require_once "Controllers/Cabinets.php";

class SigninControllers
{
    //метод отвечает на авторизация
    public static function singnin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = md5($password);

        $sql1 = "SELECT * FROM users WHERE email='$email' AND password='$password'  LIMIT 1";
        $connect = new ConnectDB();
        $connect = $connect->connectDB();
        $result = $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['user'] = $result;
            header('Location: /profile');
        } else {
            $_SESSION['error'] = 'неверный логин или пароль';
            header('Location: /');
        }
    }

}