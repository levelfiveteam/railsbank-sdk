<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Customer\Ledger\CreateLedger;
use LevelFiveTeam\Railsbank\Command\Customer\EndUsers\CreatePerson;
use LevelFiveTeam\Railsbank\Query\Customer\GetLedger;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'play_live');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

// In controller or service, you can create the individual first, then ledger, and get an account - or all in one :)
// This example splits up the commands for queue, or can be done in memory just like below....
// Really that simple :)
$command = new CreatePerson(
    [
        'name' => 'Rawinder Singh Binning',
    ]
);

// First we register
$person = $railsbank->handle($command);
$endUserId = $person->getEndUserId();

echo PHP_EOL . 'Your user id is: ' . $endUserId;

// Create new account -= PayrNet-GBP-1 in live, Examplebank-GBP-1 in test
$newLedger = $railsbank->handle(new CreateLedger(['holder_id' => $endUserId, 'partner_product' => 'PayrNet-GBP-1']));
$ledgerId = $newLedger->getLedgerId();

echo PHP_EOL . 'Your ledger id is: ' . $ledgerId;

// Get new account
$ledger = $railsbank->handle(new GetLedger(['ledger_id' => $ledgerId]));

if ($ledger->isLedgerStatusOk()) {
    echo PHP_EOL . 'Your bank details are .... ' . $ledger->getAccountNumber() . ' and sort code: ' . $ledger->getSortCode() . ' - account status: ' . $ledger->getStatus() . ', balance = ' . $ledger->getCurrentBalance();
} else {
    echo PHP_EOL . 'Account creation failed, status: ' . $ledger->getStatus() . PHP_EOL;
}
