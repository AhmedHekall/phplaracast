<?php

use Core\Authenticator;




// logout();

// header('location:/');
// exit();
$logout = new Authenticator;
$logout->logout();
redirect('/');
