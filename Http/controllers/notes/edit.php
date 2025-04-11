<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$curretUserId = 1;

$note = $db->query('select * from notes where id=:id', [':id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] !== $curretUserId);

view('notes/edit.view.php', [
       'heading' => 'Edit Note',
       'errors' => [],
       'note' => $note

]);
