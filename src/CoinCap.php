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

    /**
        Sample Returned Data

        [btcPrice] => 895.4
        [btcCap] => 14407814245
        [altCap] => 2432225487
        [dom] => 86
        [bitnodesCount] => 5658
     */

    public function getBTCCoinInfo()
    {
        $uri = "http://socket.coincap.io/global";

        $result = json_decode(file_get_contents($uri), true); // converts it to an array object

        if (isset($result['btcPrice'])) {
            return $result['btcPrice'];
        }
        return "error";

    }


}


