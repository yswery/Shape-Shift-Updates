<?php

namespace SSPro;

/**
 * Class CoinDesk
 *  - Gets coin prices from CoinDesk.com API
 *
 * @package SSPro
 */
class CoinDesk
{


    public function get_CoinDesk_BTC()
    {
        $uri = "https://api.coindesk.com/v1/bpi/currentprice.json";

        $result = json_decode(file_get_contents($uri), true); // converts it to an array object

        return $result = $result['bpi']['USD'];

    }

    public function set_CoinDesk_BTC()
    {
        $db = new DBController();
        $data = $this->get_CoinDesk_BTC();

        $db->insertPriceDB("BTC", $data['rate'], 1, "CoinDesk");
    }

}


