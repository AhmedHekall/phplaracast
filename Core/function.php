<?php

use Core\Response;
use Core\Session;

function abort($code = 404)
{
       http_response_code($code);
       require base_path("views/{$code}.php");
       die();
}
function dd($value)
{
       echo "<pre>";
       var_dump($value);
       echo "</pre>";
       die();
}

function urlIs($value)
{
       return $_SERVER['REQUEST_URI'] === $value;
}

//outhorgized **id is exist but the user dont allow access this data
function authorize($condition, $status = Response::FORBIDDEN)
{
       if ($condition) {
              abort($status);
       }
}
function base_path($path)
{
       return BASE_PATH . $path;
}
function view($path, $attributes = [])
{
       extract($attributes);
       require base_path('views/' . $path);
}
//login function 
// function login($user)
// {
//        $_SESSION['user'] = [
//               'email' => $user['email'],
//        ];
//        session_regenerate_id(true);
// }
// function logout()
// {
//        $_SESSION = [];
//        session_destroy();
//        $params = session_get_cookie_params();
//        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
// }
function redirect(string $path)
{
       header("location:{$path}");
       exit();
}
function old($key, $default = '')
{
       return Session::get('old')[$key] ?? $default;
}
