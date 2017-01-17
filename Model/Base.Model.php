<?php

namespace SSPro\Model;

use SSPro\Service\DB;

abstract class Base
{
    protected $database;

    public function __construct()
    {
        $this->database = DB::getInstance();
    }

}
