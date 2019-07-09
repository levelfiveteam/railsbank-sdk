<?php
require_once '../vendor/autoload.php';


use Railsbank\Query\Customer\GetLedgers;
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
$response = $railsbank->handle(new GetLedgers());

// raw response using GetLedgers
$ledgers = json_decode($response);

foreach ($ledgers as $ledger) {
    echo 'Holder ID: ' . $ledger->holder_id;
    echo PHP_EOL;
    echo 'Account name: ' . $ledger->ledger_holder->person->name;
    echo PHP_EOL;
    echo 'Ledger ID: ' . $ledger->ledger_id;
    echo PHP_EOL;
    echo 'Account number: ' . $ledger->uk_account_number;
    echo PHP_EOL;
    echo 'Sort code: ' . $ledger->uk_sort_code;
    echo PHP_EOL . PHP_EOL;
    echo ' ======== ';
    echo PHP_EOL . PHP_EOL;
}
