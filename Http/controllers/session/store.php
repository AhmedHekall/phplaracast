<?php


use Core\Authenticator;
use Http\Forms\LogForm;


$email = $_POST['email'];
$password = $_POST['password'];


//validation query inpyt
$form = new LogForm;
if ($form->validate($email, $password)) {
       $auth = new Authenticator;
       if ($auth->attempt($email, $password)) {
              redirect('/');
       }
       $form->error('email', 'no matching acount found that for email address and not invalid pasword.');
}


$_SESSION['_flash']['errors']=$form->errors();
redirect('/login');


// return view('session/create.view.php', [
//        'errors' => $form->errors()
// ]);
