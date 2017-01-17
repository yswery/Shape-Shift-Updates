<?php


namespace SSPro;

use Dotenv\Dotenv;
use SSPro\Controller\ProcessShapeShift;

require 'vendor/autoload.php';

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

session_start();



if (isset($_SERVER['REDIRECT_URL'])) {
    $uri = str_replace('/', '', $_SERVER['REDIRECT_URL']);
}

if ($uri == '') {
    header('location: /login');
    die();
}

else if ($uri == 'login') {
    $home = new ProcessShapeShift();
    $home->get_ShapeShifter_Rates();
}

else {
    header('location: /login');
    die();
}


