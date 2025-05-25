<?php

namespace App;

class Validator {

    static public $signupErrors = [];

    static public function validateSignup(string $name, string $email, string $password)
    {
    
        if (trim($name) === '' || strlen($name) <= 2) 
        {
            self::$signupErrors[] = "Name Can not be less than 3 letters";
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL) ) 
        {
            self::$signupErrors[] = "Invalid Email!";
        }
        
        if (trim($password) == '' || strlen($password) <= 7) 
        {
            self::$signupErrors[] = "Password can't be less than 8 letters";
        }
        return self::$signupErrors;
    }

}