<?php

namespace SSPro;

use PHPMailer;

class Process
{

    private $coincap;
    private $coinbase;
    private $coindesk;
    private $polon;

    public function __construct()
    {
        $this->coincap = new CoinCap();
        $this->coinbase = new Coinbase();
        $this->coindesk = new CoinDesk();
        $this->polon = new Poloniex();
    }


    /**
     * Sets the price of BTC in the database
     */
    public function set_Prices_BTC()
    {
        $this->coincap->set_CoinCap_BTC();
        $this->coinbase->set_Coinbase_BTC();
        $this->coindesk->set_CoinDesk_BTC();
        $this->polon->set_data('USDT_BTC');
        $this->polon->set_data('BTC_ETH');
        $this->polon->set_data_reverse('BTC_ETH');
        $this->polon->set_data_reverse('BTC_XMR');
    }


    /**
     * This sets the Coin Balances as well as the Total Balance
     */
    public function set_poloniex_Coin_Balances()
    {
        $poloniex = new KeyPoloniex();
        $db = new DBController();
        $result = $poloniex->get_total_btc_balance();

        foreach ($result as $value) {
            $keys = array_keys($value);
            if (!in_array('Total_Balance', $keys)) {
                $db->insertPoloniexCoinBalances($keys[0], $value['Balance'], $value[$keys[0]]['last']);
            } else {
                $usd = $poloniex->get_ticker("USDT_BTC");
                $btcUSDValue = round($usd['last'] * $value['Total_Balance'], 2);
                $db->insertPoloniexTotalBalances($value['Total_Balance'], $btcUSDValue);
            }
        }
    }

    public function set_ShapeShifter_Rates()
    {
        $shape = new ShapeShifter();
        $shape->set_BTC_ETH();
        $shape->set_ETH_BTC();
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
                       <pre>Rate: 1BTC = $this->rate ETH</pre>
                       <pre>Limit: $this->limit</pre>
                       <pre>Fee: $this->fee</pre>
                               
                       <h4>CoinCap.io (Used by ShapeShift)</h4>
                       <pre>Bitcoin USD $$this->Coincap_BTCValueUSD</pre>
                       
                       <h4>Coinbase</h4>
                       <pre>Bitcoin USD $$this->BTCValueUSD ($$this->BTCValueNZD NZD)</pre>
                       <pre>Ether USD $$this->ETHValueUSD ($$this->ETHValueNZD NZD)</pre>
                       
                       <h4>CoinDesk</h4>
                       <pre>Bitcoin USD $$this->Coindesk_BTCValueUSD</pre>     
        ";

        // Sends the email
        $mail->send();

    }



}


