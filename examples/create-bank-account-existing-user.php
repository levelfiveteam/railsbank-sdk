<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Customer\Ledger\CreateLedger;
use LevelFiveTeam\Railsbank\Query\Customer\GetLedger;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

// Create new account -= PayrNet-GBP-1 in live, Examplebank-GBP-1 in test
/** @var \LevelFiveTeam\Railsbank\Entity\Customer\Ledger $ledger */
$newLedger = $railsbank->handle(new CreateLedger(['holder_id' => '5d0cda91-6296-4787-b807-3fdeed13f411', 'partner_product' => 'PayrNet-GBP-1']));
$ledgerId = $newLedger->getLedgerId();

echo PHP_EOL . 'Your ledger id is: ' . $ledgerId;

// Get new account
/** @var \LevelFiveTeam\Railsbank\Entity\Customer\GetLedger $ledger */
$ledger = $railsbank->handle(new GetLedger(['ledger_id' => $ledgerId]));

if ($ledger->isLedgerStatusOk()) {
    echo PHP_EOL . 'Your bank details are .... ' . $ledger->getAccountNumber() . ' and sort code: ' . $ledger->getSortCode() . ' - account status: ' . $ledger->getStatus() . ', balance = ' . $ledger->getCurrentBalance();
} else {
    echo PHP_EOL . 'Account creation failed, status: ' . $ledger->getStatus() . PHP_EOL;
}
