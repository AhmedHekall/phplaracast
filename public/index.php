<?php

use Core\Session;

session_start();
const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'Core/function.php';

// return strin of name class. used it to autoload class automaticly
spl_autoload_register(function ($class) {

       // because of namespace return class Core\database then used str_replace   

       // \\ becuse scaping
       $class = str_replace('\\', '/', $class);

       require base_path("{$class}.php");
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
require base_path('bootstrap.php');

$router = new \Core\Router();

// make include file which contant routes
$routes = require base_path("routes.php");

// make parse(تحليل) to url and return value of path (/ex/ex  =>path)
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// make check for $_POST[_method] if is isset $method=$_POST[_method] |||||  if not found  $method=$_SERVER['REQUEST_METHOD']
//$_POST['_method'] it is make from input type hidden
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// run path
$router->route($uri, $method);

// unset($_SESSION['_flash']);
Session::unflash();
