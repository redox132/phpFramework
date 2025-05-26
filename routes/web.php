<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;

$router->get('/', [HomeController::class, 'index']);

$router->get('/signup', 'resources/views/signup.view.php')->only('guest');
$router->post('/signup', 'app/http/controllers/actions/signup.php')->only('guest');
$router->get('/login', 'resources/views/login.view.php')->only('guest');
$router->post('/login', 'app/http/controllers/actions/login.php')->only('guest');
$router->delete('/logout', 'app/http/controllers/actions/logout.php')->only('auth');

$router->post('/addNote', [NoteController::class, 'addNote'])->only('auth');
$router->delete('/deleteNote', 'app/http/controllers/actions/note/destroy.php')->only('auth');
$router->put('/editNote', 'app/http/controllers/actions/note/edit.php')->only('auth');