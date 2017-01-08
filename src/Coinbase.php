<?php

namespace SSPro;


use PHPMailer;
use SSPro\Details;

class Coinbase
{
    /****************************************************
     * BUY
     ****************************************************/
    public function getBuyBTCValueUSD()
    {
        $uri = "https://api.coinbase.com/v2/prices/BTC-USD/buy";

        $btc = json_decode(file_get_contents($uri), true);

        if (isset($btc['data']['amount'])) {
            return $btc['data']['amount'];
        }
        return "error";

    }

    public function getBuyBTCValueNZD()
    {
        $uri = "https://api.coinbase.com/v2/prices/BTC-NZD/buy";

        $btc = json_decode(file_get_contents($uri), true);

        if (isset($btc['data']['amount'])) {
            return $btc['data']['amount'];
        }
        return "error";
    }

    public function getBuyETHValueUSD()
    {
        $uri = "https://api.coinbase.com/v2/prices/ETH-USD/buy";

        $eth = json_decode(file_get_contents($uri), true);

        if (isset($eth['data']['amount'])) {
            return $eth['data']['amount'];
        }
        return "error";
    }

    public function getBuyETHValueNZD()
    {
        $uri = "https://api.coinbase.com/v2/prices/ETH-NZD/buy";

        $eth = json_decode(file_get_contents($uri), true);

        if (isset($eth['data']['amount'])) {
            return $eth['data']['amount'];
        }
        return "error";
    }

    /****************************************************
     * SELL
     ****************************************************/

    public function getSellBTCValueUSD()
    {
        $uri = "https://api.coinbase.com/v2/prices/BTC-USD/sell";

        $btc = json_decode(file_get_contents($uri), true);

        if (isset($btc['data']['amount'])) {
            return $btc['data']['amount'];
        }
        return "error";

    }

    public function getSellBTCValueNZD()
    {
        $uri = "https://api.coinbase.com/v2/prices/BTC-NZD/sell";

        $btc = json_decode(file_get_contents($uri), true);

        if (isset($btc['data']['amount'])) {
            return $btc['data']['amount'];
        }
        return "error";
    }

    public function getSellETHValueUSD()
    {
        $uri = "https://api.coinbase.com/v2/prices/ETH-USD/sell";

        $eth = json_decode(file_get_contents($uri), true);

        if (isset($eth['data']['amount'])) {
            return $eth['data']['amount'];
        }
        return "error";
    }

    public function getSellETHValueNZD()
    {
        $uri = "https://api.coinbase.com/v2/prices/ETH-NZD/sell";

        $eth = json_decode(file_get_contents($uri), true);

        if (isset($eth['data']['amount'])) {
            return $eth['data']['amount'];
        }
        return "error";
    }


}


