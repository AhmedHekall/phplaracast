<?php

use Core\App;
use Core\Validator;


// use Core\Database;
// $config = require base_path("config.php");
// $db = new Database($config['database']);
// $db = App::container()->resolve('Core\Database'); ===$db=App::container()->resolve(Core\Database::class);
$db = App::container()->resolve(Core\Database::class);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       if (! Validator::string($_POST['body'], 1, 1000)) {
              $errors['body'] = 'A body can not be more than 1000 characters is required ';
       }

       if (! empty($errors)) {
              return view('notes/create.view.php', ['errors' => $errors]);
       }


       $db->query('INSERT INTO notes (body) VALUES (:body)', ['body' => $_POST['body']]);

       header('location: /notes');
       die();
}
