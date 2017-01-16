<?php

namespace SSPro;

class Poloniex
{
    /**
     * String must have a valid coin to coin reference
     * Example
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
        $db->insertPoloniexRateDB($coin, round($data['last'],4) , round($data['high24hr'],4), round($data['low24hr'],4));
    }


    /**
     * Converts the BTC value into the number of coins you will get in return
     */
    public function set_data_reverse($coin)
    {
        $db = new DBController();
        $data = $this->get_data($coin);
        $data['last'] = 1 / $data['last'];
        $data['high24hr'] = 1 / $data['high24hr'];
        $data['low24hr'] = 1 / $data['low24hr'];
        $data['lowestAsk'] = 1 / $data['lowestAsk'];
        $data['highestBid'] = 1 / $data['highestBid'];
        $split = explode('_', $coin);
        $coin = $split[1] . "_" . $split[0];

        /**
         * Params low/high switched to reflect diff math
         */
        $db->insertPoloniexRateDB($coin, round($data['last'],2), round($data['low24hr'],2), round($data['high24hr'],2));
    }
}