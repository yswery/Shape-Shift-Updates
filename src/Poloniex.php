<?php

namespace SSPro;

class Poloniex
{
    public function get_data($coin)
    {
        $uri = "https://poloniex.com/public?command=returnTicker";

        $data = json_decode(file_get_contents($uri), true);

        return $data["BTC_" . $coin];
    }

    public function set_data($coin)
    {
        $db = new DBController();
        $data = $this->get_data($coin);

        $db->insertPoloniexRateDB($coin, $data['high24hr'], $data['low24hr'], $data['lowestAsk'], $data['highestBid']);
    }
}