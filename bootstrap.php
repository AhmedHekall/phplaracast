<?php

use Core\App;
use Core\Database;
use Core\Container;


$container = new Container;


// use namespace => Core\Database && function =>that reponsible for bilding up the database object .
$container->bind('Core\Database', function () {


       $config = require base_path('config.php');

       return new Database($config['database']);
});
App::setContainer($container);
