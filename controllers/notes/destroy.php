<?php

use Core\App;
use Core\Database;

// use Core\Database;
// $config = require base_path('config.php');
// $db = new Database($config['database']);


// $db = App::container()->resolve('Core\Database');    === $db=App::container()->resolve(Core\Database::class);

// $db = App::container()->resolve(Core\Database::class);

$db = App::resolve(Database::class);

$curretUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // ----  this is grab becouse if does not exist ممكن delete all notes 
       $note = $db->query('select * from notes where id=:id', [':id' => $_POST['id']])->findOrFail();

       authorize($note['user_id'] !== $curretUserId);
       //--------------
       $db->query('DELETE FROM notes WHERE id=:id', [
              ':id' => $_POST['id']
       ]);
       header('location:/notes');
       exit();
}
