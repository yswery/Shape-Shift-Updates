<?php

namespace SSPro;

/**
 * Class Coinbase
 *  - Gets coin prices from Coinbase.com API
 *
 * @package SSPro
 */

class Coinbase
{
    /****************************************************
     * BUY prices
     ****************************************************/
    public function get_Coinbase_BTC()
    {
        $uri = "https://api.coinbase.com/v2/prices/BTC-USD/buy";

        $btc = json_decode(file_get_contents($uri), true);

        return $btc['data']['amount'];

    }

    public function set_Coinbase_BTC()
    {
        $db = new DBController();
        $data = $this->get_Coinbase_BTC();

        $db->insertPriceDB("BTC", $data, 1, "Coinbase");
    }


}


