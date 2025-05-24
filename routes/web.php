<?php

$router->get('/', 'resources/views/index.view.php')->only('auth');
$router->get('/signup', 'resources/views/signup.view.php')->only('guest');