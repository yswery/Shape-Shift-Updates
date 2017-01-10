<?php

namespace SSPro;

require 'vendor/autoload.php';

use Dotenv;

// Loads the .env file with our credentials
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$shape = new ShapeShifter();
$rate = $shape->getCurrentRate();

if ($rate > 88) {
    $process = new Process();
    $status = $process->setTimeEmailSent();
    if ($status) {
        $process->sendEmail();
    } 
}
