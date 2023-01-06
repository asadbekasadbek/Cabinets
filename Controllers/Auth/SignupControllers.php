<?php

namespace Controllers\Auth;

use Models\ConnectDB;
use PDO;


require_once "Models/ConnectDB.php";

class SignupControllers
{
    public static function signup(){
        $full_name =$_POST['full_name'];
        $email =$_POST['email'];
        $telephone=$_POST['telephone'];
        $password =$_POST['password'];
        $password_confirm =$_POST['password_confirm'];
        if($password==null){
            $_SESSION['message']='введите пароль';
            header('Location: /register');
            exit();
        }
        $connect = new ConnectDB();
        $connect =$connect->connectDB();
        if($password === $password_confirm){
            $sql2      = "SELECT * FROM users WHERE email IN ('". $email. "')";
            $result=$connect->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                $_SESSION['email']='email существует пожалуйста выберите другой email';
                header('Location: /register');
                exit();
            }

            $sql2      = "SELECT * FROM users WHERE email IN ('". $telephone. "')";
            $result=$connect->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                $_SESSION['telephone']='Номер существует пожалуйста выберите другой email';
                header('Location: /register');
                exit();
            }

            $password =md5($password);
            $sql3 = "INSERT INTO `users` (`id`, `full_name`, `email`,`telephone`, `password`) VALUES (NULL, '$full_name','$email','$telephone','$password');";
            $connect->query($sql3)->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['index']='Регистрация успешно завершена';
            header('Location: /profile');

        }else{
            $_SESSION['message']='Пароли не совпадаю';
            header('Location: /register');
        }
    }
}