<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

//validate form inputs.
$errors = [];
if (! Validator::email($email)) {

       $errors['email'] = 'please provide a valid email address';
}

if (!Validator::string($password, 7, 100)) {
       $errors['password'] = 'please the password must be gretar than 7 and liss than 100 ';
}



if (! empty($errors)) {
       return view('registration/create.view.php', [
              'errors' => $errors

       ]);
}



$db = App::resolve(Database::class);
//chick if acount is exists in db 
$user = $db->query('SELECT * FROM users WHERE email=:email', [
       ':email' => $email
])->find();

//if yes , redirect to login page
if ($user) {
       header('location:/');
       exit();
} else {
       //if no , save one in data base , and log the user in and redirect
       $db->query('INSERT INTO users (`email`,`password`) VALUES (:email , :password)', [
              'email' => $email,
              'password' => password_hash($password, PASSWORD_BCRYPT)
       ]);
       // $_SESSION['user'] = [
       //        'email' => $email

       // ];

       login($user);

       header('location:/');
       exit();
}
