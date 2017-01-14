<?php

namespace SSPro;

require 'vendor/autoload.php';

use Dotenv;
// Loads the .env file with our credentials
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();


$process = new Process();

$process->set_poloniex_Coin_Balances();
$process->set_Prices_BTC();
$process->set_ShapeShifter_Rates();

die();



