<?php

namespace App\Http\Middlewares;

class Guest 
{

    static public function access() :void 
    {
        if ( isset($_SESSION['user']) ) {
            redirect('/');
            exit();
        }
    }
    
}