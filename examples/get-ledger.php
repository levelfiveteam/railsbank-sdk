<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Query\Customer\GetLedger;
use LevelFiveTeam\Railsbank\Railsbank;

$ledgerId = $argv[1];

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

// In controller or service, Run command (in memory - GetVersion) using my config (which should be stored in a DI Container)
// Really that simple :)
$response = $railsbank->handle(new GetLedger(['ledger_id' => $ledgerId]));
var_dump($response);
