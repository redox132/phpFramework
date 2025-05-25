<?php

use App\Http\Controllers\UserController;
use App\Validator;

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


$signupErrors = Validator::validateSignup($name, $email, $password);

if (empty($signupErrors)) {
    UserController::registerUser($name, $email, $password);
    
    $_SESSION['success'] = true;
    header("Location: /signup");
    exit;

} else {
    $_SESSION['signupErrors'] = $signupErrors;

    // Redirect back to the signup page
    header("Location: /signup");
    exit;
}
