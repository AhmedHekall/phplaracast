<?php


namespace Core\middelware;

// run the middelware classes in class router without code duplication
class Middelware
{
       public const MAP =
       [
              'guest' => Guest::class,
              'auth' => Auth::class

       ];

       public static function resolve($key)
       {
              if (!$key) {
                     return;
              }
              $middelware = static::MAP[$key];

              if (!$middelware) {
                     throw new \Exception('no matching middelware found for key ' . $key . ' .');
              }

              (new $middelware)->handle();
       }
}
