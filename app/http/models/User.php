<?php

namespace App\Http\Models;
use App\Database;
use App\Http\Controllers\SessionController;

class User 
{


      static public function registerUser( string $name, string $email, string $password) 
      {

        $user = Database::query("SELECT * FROM users WHERE email = :email", [':email' => $email])->fetch();

        if (!$user)  
        {
                Database::query("INSERT INTO users (name, email, password) VALUES(:name, :email, :password)",
                [
                    ':name' => $name,
                    ':email' =>  $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT)
                ]
            );

        }

    }

    static public function authenticate ($email, $password) {
        $password = htmlspecialchars(trim($password));
        $password = htmlspecialchars(trim($password));
        $user = Database::query("SELECT * FROM users WHERE email = :email", [':email' => $email])->fetch();

        if ( $user && password_verify($password, $user['password'])) {
            SessionController::authenticate($user);
            redirect();
        }

    }

}