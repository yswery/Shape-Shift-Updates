<?php

namespace SSPro;


use PHPMailer;
use SSPro\Details;

class Shape
{
    private $coinInfo;
    private $rate;
    private $limit;
    private $fee;
    private $BTCValueUSD;
    private $ETHValueUSD;
    private $BTCValueNZD;
    private $ETHValueNZD;

    function __construct()
    {
        $this->getCoinInfo();
        $this->BTCValueUSD = $this->getBTCValueUSD();
        $this->BTCValueNZD = $this->getBTCValueNZD();
        $this->ETHValueUSD = $this->getETHValueUSD();
        $this->ETHValueNZD = $this->getETHValueNZD();

    }

    private function getCoinInfo()
    {
        $uri = "https://shapeshift.io/marketinfo/btc_eth";

        $result = json_decode(file_get_contents($uri), true); // converts it to an array object

        (isset($result['rate'])) ? $this->rate = $result['rate'] : "";
        (isset($result['limit'])) ? $this->limit = $result['limit'] : "";
        (isset($result['minerFee'])) ? $this->fee = $result['minerFee'] : "";

    }

    private function getBTCValueUSD()
    {
        $uri = "https://api.coinbase.com/v2/prices/BTC-USD/buy";

        $btc = json_decode(file_get_contents($uri), true);

        if (isset($btc['data']['amount'])) {
            return $btc['data']['amount'];
        }
        return "error";

    }

    private function getBTCValueNZD()
    {
        $uri = "https://api.coinbase.com/v2/prices/BTC-NZD/buy";

        $btc = json_decode(file_get_contents($uri), true);

        if (isset($btc['data']['amount'])) {
            return $btc['data']['amount'];
        }
        return "error";
    }

    private function getETHValueUSD()
    {
        $uri = "https://api.coinbase.com/v2/prices/ETH-USD/buy";

        $eth = json_decode(file_get_contents($uri), true);

        if (isset($eth['data']['amount'])) {
            return $eth['data']['amount'];
        }
        return "error";
    }

    private function getETHValueNZD()
    {
        $uri = "https://api.coinbase.com/v2/prices/ETH-NZD/buy";

        $eth = json_decode(file_get_contents($uri), true);

        if (isset($eth['data']['amount'])) {
            return $eth['data']['amount'];
        }
        return "error";
    }



    public function sendEmail()
    {

        $info = new Details();
        $mail = new PHPMailer();

        $mail->SMTPDebug = 3;

        //Set PHPMailer to use SMTP.
        $mail->isSMTP();

        $mail->Host = "smtp.gmail.com";

        // Gmail SMTP requires TLS encryption
        $mail->SMTPSecure = "tls";

        // TCP Port
        $mail->Port = 587;

        //Set this to true as Gmail requires authentication to send email
        $mail->SMTPAuth = true;

        //Provide username and password
        $mail->Username = $info->email;
        $mail->Password = $info->pass;

        $mail->FromName = "SS BTC/ETH Update";

        $mail->addAddress($info->emailTo);

        $mail->isHTML(true);

        $mail->Subject = "BTC_ETH Update";
        $mail->Body = "<h4>Shape Shift : Bitcoin / Ether Update</h4>
                       <br>
                       <i>Rate $this->rate</i>
                       <br>
                       <i>Limit $this->limit</i>
                       <br>
                       <i>Fee $this->fee</i>
                       <br>
                       <h4>Coinbase : Price update</h4>
                       <i>Bitcoin USD $$this->BTCValueUSD</i>
                       <br>
                       <i>Ether USD $$this->ETHValueUSD</i>
                       <br><br>
                       <i>Bitcoin NZD $$this->BTCValueNZD</i>
                       <br>
                       <i>Ether NZD $$this->ETHValueNZD</i>
        ";

        // Sends the email
        $mail->send();

    }



}


