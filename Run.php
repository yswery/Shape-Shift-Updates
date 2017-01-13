<?php

namespace SSPro;

require 'vendor/autoload.php';

use Dotenv;
// Loads the .env file with our credentials
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();


$test = new poloniex();
$result = $test->get_total_btc_balance();
var_dump($result);
die();



$poloniex = new Poloniex();
$coindesk = new CoinDesk();
$coinbase = new Coinbase();
$coincap = new CoinCap();
$shapeshifter = new ShapeShifter();

$shapeshifter->set_BTC_ETH();
$shapeshifter->set_ETH_BTC();



$poloniex->set_data("ETH");
$poloniex->set_data("ETC");
$poloniex->set_data("XMR");
$poloniex->set_data("AMP");
$poloniex->set_data("DASH");



