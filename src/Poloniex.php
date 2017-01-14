<?php

namespace SSPro;

class Poloniex
{
    /**
     * String must have a valid coin to coin reference
     *
     * EG
     *
     * 'BTC_ETH'
     * 'USDT_BTC'
     */


    public function get_data($coin)
    {
        $uri = "https://poloniex.com/public?command=returnTicker";

        $data = json_decode(file_get_contents($uri), true);

        return $data[$coin];
    }

    public function set_data($coin)
    {
        $db = new DBController();
        $data = $this->get_data($coin);

        $db->insertPriceDB("BTC", $data['last'], 1, "Poloniex");
        $db->insertPoloniexRateDB($coin, $data['last'], $data['high24hr'], $data['low24hr'], $data['lowestAsk'], $data['highestBid']);
    }
}