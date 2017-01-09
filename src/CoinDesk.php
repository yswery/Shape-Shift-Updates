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

    /**
    Sample Returned Data

    ["bpi"]=>
        array(3) {
            ["USD"]=>
            array(5) {
            ["code"]=>
            string(3) "USD"
            ["symbol"]=>
            string(5) "&#36;"
            ["rate"]=>
            string(8) "884.3275"
            ["description"]=>
            string(20) "United States Dollar"
            ["rate_float"]=>
            float(884.3275)
        }
     */

    public function getCoinInfo()
    {
        $uri = "https://api.coindesk.com/v1/bpi/currentprice.json";

        $result = json_decode(file_get_contents($uri), true); // converts it to an array object

        if (isset($result['bpi']['USD']['rate'])) {
            return $result['bpi']['USD']['rate'];
        }
        return "error";

    }

}


