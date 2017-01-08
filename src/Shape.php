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

    private function getCoinInfo()
    {
        $uri = "https://shapeshift.io/marketinfo/btc_eth";

        $this->coinInfo = json_decode(file_get_contents($uri), true); // converts it to an array object

        $this->rate = $this->coinInfo['rate'];
        $this->limit = $this->coinInfo['limit'];
        $this->fee = $this->coinInfo['minerFee'];
    }

    public function sendEmail()
    {
        $info = new Details();

        $this->getCoinInfo();


        //var_dump($this->coinInfo); die();



        $mail = new PHPMailer();

        $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();

        $mail->Host = "smtp.gmail.com";

        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;

        //Provide username and password
        $mail->Username = $info->email;
        $mail->Password = $info->pass;

        // Gmail SMTP requires TLS encryption
        $mail->SMTPSecure = "tls";

        // TCP Port
        $mail->Port = 587;

        $mail->FromName = "ShapeShift Bitcoin/Ether Update";

        $mail->addAddress($info->emailTo);

        $mail->isHTML(true);

        $mail->Subject = "BTC_ETH Update";
        $mail->Body = "<b>Bitcoin / Ether Update</b>
                       <br>
                       <i>Rate $this->rate</i>
                       <br>
                       <i>Limit $this->limit</i>
                       <br>
                       <i>Fee $this->fee</i>
        ";

        // Sends the email
        $mail->send();

    }



}


