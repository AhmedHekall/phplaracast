<?php

use Core\Registeration;
use Core\Session;
use Http\Forms\LogForm;


$form = LogForm::validate($attribute = [
       'email' => $_POST['email'],
       'password' => $_POST['password']
]);

$register = (new Registeration)->attempt($attribute['email'], $attribute['password']);
// dd($register);

if ($register) {

       redirect('/');
}

Session::put('email', $attribute['email']);

redirect("/login");
