<?php

namespace SSPro;

abstract class Base
{
    protected $database;

    public function __construct()
    {
        $this->database = DB::getInstance();
    }

}
