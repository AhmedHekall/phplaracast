<?php

use Core\App;

// use Core\Database;
// $config = require base_path("config.php");
// $db = new Database($config['database']);
// $db = App::container()->resolve('Core\Database');  ===$db=App::container()->resolve(Core\Database::class);
$db = App::container()->resolve(Core\Database::class);
$notes = $db->query('select * from notes where user_id = :user', [':user' => 1])->all();


view('notes/index.view.php', ['notes' => $notes]);
