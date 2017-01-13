<?php

namespace SSPro;

class DBController
{
    private $db;

    function __construct()
    {
        $this->db = new MyDB();
    }

    public function queryDB($query)
    {
        $result = $this->db->query($query);

        $data = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function insertPriceDB($coin, $priceUSD, $priceBTC, $provider)
    {
        $this->db->exec("INSERT INTO `prices`(`id`,`coin`,`price_usd`,`price_btc`,`provider`,`created_at`) 
                         VALUES (NULL,'$coin' , '$priceUSD', '$priceBTC', '$provider', datetime(CURRENT_TIMESTAMP, 'localtime'))
                         ");
    }

    public function insertRateDB($coins, $rate, $limit, $fee)
    {

        $this->db->exec("INSERT INTO `shapeshifter_rates`(`id`,`coin`,`rate_btc`,`limit`, `fee`, `created_at`) 
                         VALUES (NULL,'$coins' , '$rate', '$limit','$fee', datetime(CURRENT_TIMESTAMP, 'localtime'))
                         ");

    }

    public function insertPoloniexRateDB($coin, $high24hr, $low24hr, $lowAsk, $highBid)
    {

        $this->db->exec("INSERT INTO `poloniex_rates`(`id`,`coin`,`high24hr`, `low24hr`, `low_ask`, `high_bid`, `created_at`) 
                         VALUES (NULL,'$coin', '$high24hr', '$low24hr', '$lowAsk', '$highBid', datetime(CURRENT_TIMESTAMP, 'localtime'))
                         ");

    }

}