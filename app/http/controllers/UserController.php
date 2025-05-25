<?php

namespace App\Http\Controllers;

use App\Http\Models\User;

class UserController
{

    static public function registerUser( string $name, string $email, string $password) 
    {
        User::registerUser($name, $email, $password);
    }

    static public function authenticate( string $email, string $password ) 
    {
       User::authenticate($email, $password);
    }

}