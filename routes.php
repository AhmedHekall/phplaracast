<?php

use Core\middelware\Guest;

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/note/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/note', 'controllers/notes/show.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/ubdate.php');



$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');


$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/login', 'controllers/session/store.php')->only('guest');
$router->delete('/logout', 'controllers/session/destroy.php')->only('auth');
