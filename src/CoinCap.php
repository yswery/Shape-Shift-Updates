<?php

namespace SSPro;

/**
 * Class CoinCap
 *  - Gets coin prices from Coincap.io API
 *
 * @package SSPro
 */
class CoinCap
{


    public function get_CoinCap_BTC()
    {
        $uri = "http://socket.coincap.io/global";

        $result = json_decode(file_get_contents($uri), true); // converts it to an array object

        return $result;
    }

    public function set_CoinCap_BTC()
    {
        $db = new DBController();
        $data = $this->get_CoinCap_BTC();

        $db->insertPriceDB("BTC", $data['btcPrice'], 1, "CoinCap");
    }


}


