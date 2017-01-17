<?php

namespace SSPro;

require 'vendor/autoload.php';

use Dotenv;
// Loads the .env file with our credentials
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

echo "it worked";
die();

