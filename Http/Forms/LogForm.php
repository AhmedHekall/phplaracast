<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LogForm
{


       protected $errors = [];


       public function __construct(public array $attributes)
       {
              if (! Validator::email($attributes['email'])) {
                     $this->errors['email'] = 'plase enter the valid email';
              }
              if (! Validator::string($attributes['password'])) {
                     $this->errors['password'] = 'plase provied avalid password';
              }
       }



       public static function validate($attributes)
       {
              // $instance = new LogForm($attributes);
              $instance = new static($attributes);

              return $instance->faild() ? $instance->throw() : $instance;


              // if ($instance->faild()) {
              //     $instance->throw();  
              // }
              // return $instance;
       }
       public function throw()
       {
              return  ValidationException::throw($this->errors, $this->attributes);
       }

       public function faild()
       {
              return count($this->errors);
       }

       public function errors()
       {
              return $this->errors;
       }
       public function error($field, $message)
       {
              $this->errors[$field] = $message;
              return $this;
       }
}
