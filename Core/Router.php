<?php

namespace Core;

use Core\middelware\Auth;
use Core\middelware\Guest;
use Core\middelware\Middelware;

class Router
{
       protected $routes = [];

       private function add($method, $uri, $controller, $middelware = null)
       {

              // $this->routes[] =
              //        [
              //               'uri' => $uri,
              //               'controller' => $controller,
              //               'method' => $method


              //        ];



              $this->routes[] = compact('method', 'uri', 'controller', 'middelware');
              return $this;
       }
       public function get($uri, $controller)
       {
              // $this->routes[] =
              //        [
              //               'uri' => $uri,
              //               'controller' => $controller,
              //               'method' => 'GET'


              //        ];

              // ****************alternative solution**************


              return  $this->add('GET', $uri, $controller);
       }
       public function post($uri, $controller)
       {
              // $this->routes[] =
              //        [
              //               'uri' => $uri,
              //               'controller' => $controller,
              //               'method' => 'POST'


              //        ];
              // ****************alternative solution**************


              return $this->add('POST', $uri, $controller);
       }
       public function delete($uri, $controller)
       {
              // $this->routes[] =
              //        [
              //               'uri' => $uri,
              //               'controller' => $controller,
              //               'method' => 'DELETE'


              //        ];

              // ****************alternative solution**************


              return $this->add('DELETE', $uri, $controller);
       }
       public function patch($uri, $controller)
       {
              // $this->routes[] =
              //        [
              //               'uri' => $uri,
              //               'controller' => $controller,
              //               'method' => 'PATCH'


              //        ];

              // ****************alternative solution**************


              return  $this->add('PATCH', $uri, $controller);
       }
       public function put($uri, $controller)
       {
              // $this->routes[] =
              //        [
              //               'uri' => $uri,
              //               'controller' => $controller,
              //               'method' => 'PUT'


              //        ]; 

              // ****************alternative solution**************


              return $this->add('PUT', $uri, $controller);
       }
       // example how make middelware
       public function only($key)
       {
              $this->routes[array_key_last($this->routes)]['middelware'] = $key;
              return $this;
       }


       // run of routes  make requre route automatecly
       public function route($uri, $method)
       {
              foreach ($this->routes as $route) {
                     // dd($this->routes);
                     if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                            //apply the middelware
                            // "Core\middelware\...."
                            Middelware::resolve($route['middelware']);




                            // if ($route['middelware']) {

                            //        $middelware = Middelware::MAP[$route['middelware']];
                            //        // "Core\middelware\...."
                            //        (new $middelware)->handel();
                            // }




                            // if ($route['middelware'] === 'guest') {
                            //        (new Guest)->handle();
                            //        // if ($_SESSION['user'] ?? false) {
                            //        //        header('location:/');
                            //        //        exit();
                            //        // }
                            // }
                            // if ($route['middelware'] === 'auth') {
                            //        // if (!isset($_SESSION['user'])) {

                            //        //        header('location:/');
                            //        //        exit();
                            //        // }
                            //        // if (! ($_SESSION['user'] ?? false)) {
                            //        //        header('location:/');
                            //        //        exit();
                            //        // }
                            //        (new Auth)->handel();
                            // }




                            return require base_path('Http/controllers/' . $route['controller']);
                     }
              }
              $this->abort();
       }
       // if not find  route show page_error
       private function abort($code = 404)
       {
              http_response_code($code);
              require base_path("views/{$code}.php");
              die();
       }
}
