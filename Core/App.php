<?php

namespace Core;
/// use it return servies who is registered in class container 
//$db = App::resolve(Database::class);
class App
{
       //property use to save 
       static protected $container;

       // use to save value of $container
       public static function setContainer($container)
       {
              static::$container = $container;
       }

       public static function container()
       {
              return static::$container;
       }
       public static function resolve($key)
       {
              return static::container()->resolve($key);
       }
       public static function bind($key, $resolver)
       {
              static::container()->bind($key, $resolver);
       }
}
