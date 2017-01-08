<?php

namespace SSPro;

use PHPMailer;

class Shape
{
    private $coinInfo;
    private $rate;
    private $limit;
    private $fee;

    private $BTCValueUSD;
    private $BTCValueNZD;
    private $BTCValueUSDSell;
    private $BTCValueNZDSell;

    private $ETHValueUSD;
    private $ETHValueNZD;
    private $ETHValueUSDSell;
    private $ETHValueNZDSell;


    function __construct()
    {
        $coinbase = new Coinbase();
        $shapeshifter = new ShapeShifter();

        $this->coinInfo = $shapeshifter->getCoinInfo();
        $this->rate = $this->coinInfo['rate'];
        $this->limit = $this->coinInfo['limit'];
        $this->fee = $this->coinInfo['minerFee'];

        $this->BTCValueUSD = $coinbase->getBuyBTCValueUSD();
        $this->BTCValueNZD = $coinbase->getBuyBTCValueNZD();
        $this->ETHValueUSD = $coinbase->getBuyETHValueUSD();
        $this->ETHValueNZD = $coinbase->getBuyETHValueNZD();
        $this->BTCValueUSDSell = $coinbase->getSellBTCValueUSD();
        $this->BTCValueNZDSell = $coinbase->getSellBTCValueNZD();
        $this->ETHValueUSDSell = $coinbase->getSellETHValueUSD();
        $this->ETHValueNZDSell = $coinbase->getSellETHValueNZD();
    }



    public function sendEmail()
    {

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
        $mail->Username = getenv('EMAIL');
        $mail->Password = getenv('PASSWORD');
print_r($mail);die('dead');
        $mail->FromName = "SS BTC/ETH Update";

        $mail->addAddress(getenv('EMAIL_TO'));

        $mail->isHTML(true);

        $mail->Subject = "BTC_ETH Update";
        $mail->Body = "<h4>Shape Shift : Bitcoin / Ether Update</h4>
                       <pre><i>Rate $this->rate</i></pre>
                       <pre><i>Limit $this->limit</i></pre>
                       <pre><i>Fee $this->fee</i></pre>
                       <br>
                       
                       <h4>Coinbase : Price update</h4>
                       <h5>BUY Prices</h5>
                       <pre>Bitcoin USD $$this->BTCValueUSD ($$this->BTCValueNZD NZD)</pre>
                       <pre>Ether USD $$this->ETHValueUSD ($$this->ETHValueNZD NZD)</pre>
                       
                       <h5>SELL Prices</h5>
                       <pre>Bitcoin USD $$this->BTCValueUSDSell ($$this->BTCValueNZDSell NZD)</pre>
                       <pre>Ether USD $$this->ETHValueUSDSell ($$this->ETHValueNZDSell NZD)</pre>

        ";

        // Sends the email
        $mail->send();

    }



}


