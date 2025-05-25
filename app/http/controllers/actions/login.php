<?php

use App\Http\Controllers\UserController;


$email = $_POST['email'];
$password = $_POST['password'];

$result = UserController::authenticate($email, $password);

