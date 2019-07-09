<?php
require_once '../vendor/autoload.php';

use Railsbank\Query\Customer\GetEndusers;
use Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

// In controller or service, Run command (in memory - GetVersion) using my config (which should be stored in a DI Container)
// Really that simple :)
$response = $railsbank->handle(new GetEndusers());

// raw response using GetLedgers
$ledgers = json_decode($response);

foreach ($ledgers as $ledger) {
    echo 'Enduser ID: ' . $ledger->enduser_id;
    echo PHP_EOL;
}
