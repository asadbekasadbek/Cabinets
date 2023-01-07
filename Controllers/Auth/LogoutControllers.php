<?php

namespace Controllers\Auth;

class LogoutControllers
{
    //метод очищает куки
    public static function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}