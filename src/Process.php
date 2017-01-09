<?php

namespace SSPro;

use PHPMailer;

class Process
{
    private $coinInfo;
    private $rate;
    private $limit;
    private $fee;

    // CoinBase Prices
    private $BTCValueUSD;
    private $BTCValueNZD;
    private $BTCValueUSDSell;
    private $BTCValueNZDSell;
    private $ETHValueUSD;
    private $ETHValueNZD;
    private $ETHValueUSDSell;
    private $ETHValueNZDSell;

    // CoinCap.io Prices
    private $Coincap_BTCValueUSD;

    // CoinDesk Prices
    private $Coindesk_BTCValueUSD;


    function __construct()
    {
        $shapeshifter = new ShapeShifter();

        $this->coinInfo = $shapeshifter->getCoinInfo();
        $this->rate = $this->coinInfo['rate'];
        $this->limit = $this->coinInfo['limit'];
        $this->fee = $this->coinInfo['minerFee'];

        $this->setCoinbaseInfo();
        $this->setCoinCapInfo();
        $this->setCoinDeskInfo();

    }

    // Sets the local variables with the Coinbase price info
    private function setCoinbaseInfo()
    {
        $coinbase = new Coinbase();

        $this->BTCValueUSD = $coinbase->getBuyBTCValueUSD();
        $this->BTCValueNZD = $coinbase->getBuyBTCValueNZD();
        $this->ETHValueUSD = $coinbase->getBuyETHValueUSD();
        $this->ETHValueNZD = $coinbase->getBuyETHValueNZD();
        $this->BTCValueUSDSell = $coinbase->getSellBTCValueUSD();
        $this->BTCValueNZDSell = $coinbase->getSellBTCValueNZD();
        $this->ETHValueUSDSell = $coinbase->getSellETHValueUSD();
        $this->ETHValueNZDSell = $coinbase->getSellETHValueNZD();
    }

    // Sets the local variable with the CoinCap price info
    private function setCoinCapInfo()
    {
        $coincap = new CoinCap();

        $this->Coincap_BTCValueUSD = $coincap->getBTCCoinInfo();
    }

    // Sets the local variable with the Coindesk price info
    private function setCoinDeskInfo()
    {
        $coindesk = new CoinDesk();

        $this->Coindesk_BTCValueUSD = $coindesk->getCoinInfo();
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
        $mail->FromName = "SS BTC/ETH Update";

        $mail->addAddress(getenv('EMAIL_TO'));

        $mail->isHTML(true);

        $mail->Subject = "BTC_ETH Update";
        $mail->Body = "<h4>Shape Shift : Bitcoin / Ether Update</h4>
                       <pre><i>Rate $this->rate</i></pre>
                       <pre><i>Limit $this->limit</i></pre>
                       <pre><i>Fee $this->fee</i></pre>
                       <br>
                               
                       <h4>CoinCap.io (Used by ShapeShift)</h4>
                       <pre>Bitcoin USD $$this->Coincap_BTCValueUSD</pre>
                       <br>
                       
                       <h4>Coinbase</h4>
                       <pre>Bitcoin USD $$this->BTCValueUSD ($$this->BTCValueNZD NZD)</pre>
                       <pre>Ether USD $$this->ETHValueUSD ($$this->ETHValueNZD NZD)</pre>
                       <br>
                       
                       <h4>CoinDesk</h4>
                       <pre>Bitcoin USD $$this->Coindesk_BTCValueUSD</pre>     
        ";

        // Sends the email
        $mail->send();

    }



}


