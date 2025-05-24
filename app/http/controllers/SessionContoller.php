<?php

namespace App\Http\Controllers;

class SessionContoller
{
    static public function auth( array $user) :void {

        $_SESSION['user'] = [
            'id' => $user['id'],
        ];

    }

    static public function destroy() :void {

        $_SESSION = [];
        session_destroy();
        
    }
}
