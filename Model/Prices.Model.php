<?php

namespace SSPro\Model;

use PDO;
use PDOException;

class Prices extends Base
{

    public function setShapeShifterRate($coin, $rate, $limit, $fee)
    {
        date_default_timezone_set('NZ');
        $date = date("H:i:s d-m-Y");

        $sql = "INSERT INTO `shapeshifter_rates` (`id`, `coin`, `rate_btc`, `limit`, `fee`, `created_at`) 
                VALUES (NULL, '$coin', '$rate', '$limit', '$fee', '$date');";
        //var_dump($sql);die();
        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $data = $stm->execute(array('$coin, $rate, $limit, $fee, $date'));
        return true;
    }


    public function getShapeShifterRate()
    {
        $sql = "SELECT * 
                FROM `shapeshifter_rates`  
                ORDER BY `created_at` ASC
                LIMIT 20
                ";

        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stm->execute();

        $data = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getShapeShifterCurrencyRate($currency)
    {
        $sql = "SELECT * 
                FROM `shapeshifter_rates`  
                WHERE `coin` = 'BTC_".$currency."'
                ORDER BY `id` DESC 
                LIMIT 10
                ";

        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stm->execute();

        $data = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


}