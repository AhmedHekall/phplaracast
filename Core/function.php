<?php

use Core\Response;

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
