<?php

namespace SSPro\Controller;

use PHPMailer;
use SSPro\Model\Prices;
use SSPro\ShapeShifter;

class ProcessShapeShift extends Base
{
    private $shape;

    public function __construct()
    {
        $this->shape = new ShapeShifter();
    }

    public function set_ShapeShifter_Rates()
    {
        $btcResult = $this->shape->get_BTC_ETH();
        $ethResult = $this->shape->get_ETH_BTC();
        $xmrResult = $this->shape->get_BTC_XMR();

        $db = new Prices();
        try {
            $db->setShapeShifterRate(strtoupper($btcResult['pair']), round($btcResult['rate'], 3), round($btcResult['limit'], 3), round($btcResult['minerFee'], 3));
            $db->setShapeShifterRate(strtoupper($ethResult['pair']), round($ethResult['rate'], 3), round($ethResult['limit'], 3), round($ethResult['minerFee'], 3));
            $db->setShapeShifterRate(strtoupper($xmrResult['pair']), round($xmrResult['rate'], 3), round($xmrResult['limit'], 3), round($xmrResult['minerFee'], 3));

        } catch (\PDOException $exception) {
          // Meh
        }
    }

    public function get_ShapeShifter_Rates()
    {
        $prices = new Prices();
        $viewData = $prices->getShapeShifterRate_XMR_ETH();

        $this->render('Welcome', 'home.view', $viewData);
    }



//    /**
//     * This sets the Coin Balances as well as the Total Balance
//     */
//    public function set_poloniex_Coin_Balances()
//    {
//        $poloniex = new KeyPoloniex();
//        $db = new DBController();
//        $result = $poloniex->get_total_btc_balance();
//
//        foreach ($result as $value) {
//            $keys = array_keys($value);
//            if (!in_array('Total_Balance', $keys)) {
//                $db->insertPoloniexCoinBalances($keys[0], $value['Balance'], $value[$keys[0]]['last']);
//            } else {
//                $usd = $poloniex->get_ticker("USDT_BTC");
//                $btcUSDValue = round($usd['last'] * $value['Total_Balance'], 2);
//                $db->insertPoloniexTotalBalances($value['Total_Balance'], $btcUSDValue);
//            }
//        }
//    }




//    public function sendEmail()
//    {
//
//        $mail = new PHPMailer();
//
//        $mail->SMTPDebug = 3;
//
//        //Set PHPMailer to use SMTP.
//        $mail->isSMTP();
//
//        $mail->Host = "smtp.gmail.com";
//
//        // Gmail SMTP requires TLS encryption
//        $mail->SMTPSecure = "tls";
//
//        // TCP Port
//        $mail->Port = 587;
//
//        //Set this to true as Gmail requires authentication to send email
//        $mail->SMTPAuth = true;
//
//        //Provide username and password
//        $mail->Username = getenv('EMAIL');
//        $mail->Password = getenv('PASSWORD');
//        $mail->FromName = "SS BTC/ETH Update";
//
//        $mail->addAddress(getenv('EMAIL_TO'));
//
//        $mail->isHTML(true);
//
//        $mail->Subject = "BTC_ETH Update";
//        $mail->Body = "<h4>Shape Shift : Bitcoin / Ether Update</h4>
//                       <pre>Rate: 1BTC = $this->rate ETH</pre>
//                       <pre>Limit: $this->limit</pre>
//                       <pre>Fee: $this->fee</pre>
//
//                       <h4>CoinCap.io (Used by ShapeShift)</h4>
//                       <pre>Bitcoin USD $$this->Coincap_BTCValueUSD</pre>
//
//                       <h4>Coinbase</h4>
//                       <pre>Bitcoin USD $$this->BTCValueUSD ($$this->BTCValueNZD NZD)</pre>
//                       <pre>Ether USD $$this->ETHValueUSD ($$this->ETHValueNZD NZD)</pre>
//
//                       <h4>CoinDesk</h4>
//                       <pre>Bitcoin USD $$this->Coindesk_BTCValueUSD</pre>
//        ";
//
//        // Sends the email
//        $mail->send();
//
//    }



}


