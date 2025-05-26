<?php

namespace App\Http\Controllers;

class HomeController
{
    public function index(): void
    {
        require view('resources/views/index.view.php');
    }
}
