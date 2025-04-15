<?php

namespace Core;

class Registeration
{
       public function attempt($email, $password)
       {
              $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email=:email', [
                     ':email' => $email
              ])->find();
              if ($user) {
                     if (password_verify($password, $user['password'])) {
                            $this->register([
                                   'email' => $email
                            ]);
                            return true;
                     }
                     return false;
              }
              $user = App::resolve(Database::class)->query('INSERT INTO users (`email`,`password`) VALUES (:email , :password)', [
                     'email' => $email,
                     'password' => password_hash($password, PASSWORD_BCRYPT)
              ]);
              $this->register([
                     'email' => $email
              ]);
              return redirect('/');
       }
       public function register($user)
       {

              $_SESSION['user'] = [
                     'email' => $user['email'],
              ];
       }
}
