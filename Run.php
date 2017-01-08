<?php

namespace SSPro;

require 'vendor/autoload.php';

use SSPro\Shape;
use Dotenv;

// Loads the .env file with our credentials
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$shape = new Shape();

$shape->sendEmail();

