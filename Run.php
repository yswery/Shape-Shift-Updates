<?php

namespace SSPro;

require 'vendor/autoload.php';

use SSPro\Process;
use Dotenv;

// Loads the .env file with our credentials
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$shape = new Process();

$shape->sendEmail();
