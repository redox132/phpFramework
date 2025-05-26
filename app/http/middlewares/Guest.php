<?php

namespace App\Http\Middlewares;

class Guest 
{
    public static function access() :void 
    {
        if (isset($_SESSION['user'])) {  // IS logged in
            redirect('/');
            exit();
        }
    }
}
