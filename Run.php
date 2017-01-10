<?php

namespace SSPro;

require 'vendor/autoload.php';

use SSPro\Process;
use Dotenv;

// Loads the .env file with our credentials
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$shape = new ShapeShifter();
$rate = $shape->getCurrentRate();

if ($rate > 88) {
    $process = new Process();
    $process->sendEmail();
}
