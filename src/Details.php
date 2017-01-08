<?php

namespace SSPro;


class Details
{

    public $email;
    public $pass;
    public $emailTo;

    function __construct()
    {
        $this->email = 'example@gmail.com';
        $this->pass = 'password1234';
        $this->emailTo = 'example@example.com';
    }


}

