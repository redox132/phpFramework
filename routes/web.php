<?php

$router->get('/', 'resources/views/index.view.php')->only('auth');
$router->get('/signup', 'resources/views/signup.view.php')->only('guest');
$router->post('/signup', 'app/http/controllers/actions/signup.php')->only('guest');
$router->get('/login', 'resources/views/login.view.php')->only('guest');
$router->post('/login', 'app/http/controllers/actions/login.php')->only('guest');