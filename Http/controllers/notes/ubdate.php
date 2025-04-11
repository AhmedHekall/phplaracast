<?php


use Core\App;

use Core\Database;
use Core\Validator;

$db = App::container()->resolve(Database::class);

$curretUserId = 1;


///// find the corresponding note 

$note = $db->query('select * from notes where id=:id', [
       'id' => $_POST['id']
])->findOrFail();
// dd($note);

//authorize that the cuurentUser can edit that note

authorize($note['user_id'] !== $curretUserId);


//validation form
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
       $errors['body'] = 'A body can not be more than 1000 characters is required ';
}

if (! empty($errors)) {
       return view('notes/edit.view.php', [
              'errors' => $errors,
              'heading' => 'Edit note',
              'note' => $note
       ]);
}

// ubdate record

$db->query('UPDATE notes SET body=:body WHERE id=:id', [
       'body' => $_POST['body'],
       'id' => $_POST['id']

]);



// redirect the user

header('location:/notes');
die();
