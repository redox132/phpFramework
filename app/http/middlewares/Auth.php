<?php

namespace App\Http\Middlewares;

class Auth
{
    public static function access() {
        if (!isset($_SESSION['user'])) {  // NOT logged in
            redirect('/login');
            exit();
        }
    }
}
