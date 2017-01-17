<?php


namespace SSPro;

require 'vendor/autoload.php';

session_start();

if (isset($_SERVER['REDIRECT_URL'])) {
    $uri = str_replace('/', '', $_SERVER['REDIRECT_URL']);
}

if ($uri == '') {
    header('location: /login');
    die();
}

else if ($uri == 'login') {
    echo "hello there ";
    die();
}

else {
    header('location: /login');
    die();
}


