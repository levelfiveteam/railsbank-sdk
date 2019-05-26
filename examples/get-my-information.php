<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Query\Me\Information;
use LevelFiveTeam\Railsbank\Railsbank;

$config = require_once('demo.config.php');

$railsbank = new Railsbank($config, 'play');
$command = new Information();
$response= $railsbank->runQuery($command);

var_dump($response);
