<?php

namespace SSPro;

use PDO;

class Score extends Base
{

    public function setFunction()
    {

        $sql = "";

        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stm->execute();

        return true;
    }


    public function getFunction()
    {
        $sql = "";

        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stm->execute();

        $data = $stm->fetchAll();

        return $data;
    }


}