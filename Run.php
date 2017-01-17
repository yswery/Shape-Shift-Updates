<?php

/**
 * This class will be called by the Crontask to update the DB
 */
namespace SSPro;
use Dotenv\Dotenv;
use SSPro\Controller\ProcessShapeShift;

require 'vendor/autoload.php';

$dotenv = new Dotenv(__DIR__);
$dotenv->load();


/**
 * Updates the ShapeShift_Rates Table
 */
$shape = new ProcessShapeShift();
$shape->set_ShapeShifter_Rates();





echo "Completed";
die();



