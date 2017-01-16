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

    public function insertPoloniexRateDB($coin, $last, $high24hr, $low24hr)
    {

        $this->db->exec("INSERT INTO `poloniex_rates`(`id`,`coin`,`last`, `high24hr`, `low24hr`,`created_at`) 
                         VALUES (NULL,'$coin', '$last', '$high24hr', '$low24hr', datetime(CURRENT_TIMESTAMP, 'localtime'))
                         ");

    }

    public function insertPoloniexCoinBalances($coin, $balance, $last)
    {

        $this->db->exec("INSERT INTO `poloniex_coin_balances`(`id`,`coin`, `balance`, `last`, `created_at`)
                         VALUES (NULL, '$coin', '$balance', '$last', datetime(CURRENT_TIMESTAMP, 'localtime'))
                         ");

    }

    public function insertPoloniexTotalBalances($balanceBTC, $balanceUSD)
    {

        $this->db->exec("INSERT INTO `poloniex_total_balance`(`id`, `balance_btc`, `balance_usd`, `created_at`)
                         VALUES (NULL, '$balanceBTC', '$balanceUSD', datetime(CURRENT_TIMESTAMP, 'localtime'))
                         ");

    }

}