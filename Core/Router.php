<?php

namespace Core;

class Router
{
       protected $routes = [];

       private function add($method, $uri, $controller)
       {

              // $this->routes[] =
              //        [
              //               'uri' => $uri,
              //               'controller' => $controller,
              //               'method' => $method


              //        ];



              $this->routes[] = compact('method', 'uri', 'controller');
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


              $this->add('GET', $uri, $controller);
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


              $this->add('POST', $uri, $controller);
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


              $this->add('DELETE', $uri, $controller);
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


              $this->add('PATCH', $uri, $controller);
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


              $this->add('PUT', $uri, $controller);
       }



       // run of routes  make requre route automatecly
       public function route($uri, $method)
       {
              foreach ($this->routes as $route) {
                     // dd($this->routes);
                     if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                            // dd($route);

                            return require base_path($route['controller']);
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
