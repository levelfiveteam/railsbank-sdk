<?php
require_once '../vendor/autoload.php';

use Railsbank\Query\Me\Information;
use Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'play');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

// In controller or service, Run command (in memory - GetVersion) using my config (which should be stored in a DI Container)
// Really that simple :)
$response = $railsbank->handle(new Information());

var_dump($response);
