<?php

use Core\App;


$db = App::container()->resolve(Core\Database::class);
$curretUserId = 1;


$note = $db->query('select * from notes where id=:id', [':id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] !== $curretUserId);

view('notes/show.view.php', ['note' => $note]);
