<?php

use Core\Session;

// if ($_SESSION['user'] ?? false) {
//        header('location:/');
// }
view('registration/create.view.php', [
       'errors' => Session::get('errors')
]);
