<?php


use Core\Authenticator;

use Http\Forms\LogForm;





$form = LogForm::validate($attribute = [
       'email' => $_POST['email'],
       'password' => $_POST['password']
]);

$signIn = (new Authenticator)->attempt($attribute['email'], $attribute['password']);

if (!$signIn) {
       $form->error('email', 'No matching acount found for that email address and password .')->throw();
}

redirect('/');
