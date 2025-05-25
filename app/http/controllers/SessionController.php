<?php

namespace App\Http\Controllers;

class SessionController
{
    /**
     * Authenticate user and store info in session.
     *
     * @param array $user Associative array with user data (must include 'id')
     * @return void
     */
    public static function authenticate(array $user): void
    {
        // Prevent session fixation
        session_regenerate_id(true);

        $_SESSION['user'] = [
            'id'    => $user['id'],
            'name'  => $user['name'] ?? null,
            'email' => $user['email'] ?? null,
        ];
    }

    /**
     * Destroy the current user session.
     *
     * @return void
     */
    public static function destroy(): void
    {
        $_SESSION = [];
        session_destroy();
    }
   
}
