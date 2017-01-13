<?php

namespace SSPro;

class ShapeShifter
{
    private $rate;

    public function get_BTC_ETH()
    {
        $uri = "https://shapeshift.io/marketinfo/btc_eth";
        $result = json_decode(file_get_contents($uri), true); // converts it to an array object
        return $result;
    }

    public function get_ETH_BTC()
    {
        $uri = "https://shapeshift.io/marketinfo/eth_btc";
        $result = json_decode(file_get_contents($uri), true); // converts it to an array object
        return $result;
    }

    public function set_BTC_ETH()
    {
        $db = new DBController();
        $data = $this->get_BTC_ETH();

        $db->insertRateDB($data['pair'], $data['rate'], $data['limit'], $data['minerFee']);

    }

    public function set_ETH_BTC()
    {
        $db = new DBController();
        $data = $this->get_ETH_BTC();

        $db->insertRateDB($data['pair'], $data['rate'], $data['limit'], $data['minerFee']);

    }


}


