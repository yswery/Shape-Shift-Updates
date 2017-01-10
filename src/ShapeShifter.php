<?php

namespace SSPro;


use PHPMailer;

class ShapeShifter
{


    public function getCoinInfo()
    {
        $uri = "https://shapeshift.io/marketinfo/btc_eth";

        $result = json_decode(file_get_contents($uri), true); // converts it to an array object

        return $result;

    }

    public function getCurrentRate()
    {
        $data = $this->getCoinInfo();
        return $data['rate'];
    }


}


