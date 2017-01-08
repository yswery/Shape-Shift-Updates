<?php

namespace SSPro;

require 'vendor/autoload.php';

use SSPro\Shape;
use SSPro\Details;

$shape = new Shape();
$details = new Details();

$shape->sendEmail();

