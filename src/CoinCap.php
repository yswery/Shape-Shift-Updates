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


    public function getBTCCoinInfo()
    {
        $uri = "http://socket.coincap.io/global";

        $result = json_decode(file_get_contents($uri), true); // converts it to an array object

        var_dump($result); die();
        if (isset($result['btcPrice'])) {
            return $result['btcPrice'];
        }
        return "error";

    }


}


