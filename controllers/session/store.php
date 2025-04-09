<?php

use Core\App;
use Core\Database;
use Core\Validator;


$email = $_POST['email'];
$password = $_POST['password'];


//validation query inpyt
$errors = [];

if (! Validator::email($email)) {
       $errors['email'] = 'plase enter the valid email';
}
if (! Validator::string($password)) {
       $errors['password'] = 'plase provied avalid password';
}
if (!empty($errors)) {
       view('session/create.view.php', [
              'errors' => $errors,
       ]);
}


//  match the credentials
$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email=:email', [
       'email' => $email

])->find();



if ($user) {

       // we have auser , but we do not know if the password provied matches what we have in the data base
       if (password_verify($password, $user['password'])) {

              login([
                     'email' => $email
              ]);

              header('location:/');

              exit();
       }
}





view('session/create.view.php', [
       'errors' => [
              'password' => 'no matching acount found that for email address and not invalid pasword.',
       ]
]);
exit();
