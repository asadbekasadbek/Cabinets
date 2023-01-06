<?php

namespace Controllers\Auth;

class LogoutControllers
{
    public static function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}