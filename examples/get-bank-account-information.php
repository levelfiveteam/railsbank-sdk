<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Customer\EndUsers\Person;
use LevelFiveTeam\Railsbank\Command\Customer\Ledgers;
use LevelFiveTeam\Railsbank\Query\Customer\GetLedger;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'play');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

// Get new account
/** @var \LevelFiveTeam\Railsbank\Entity\Customer\GetLedger $ledger */
$ledger = $railsbank->handle(new GetLedger(['ledger_id' => '5d0cda91-6296-4787-b807-3fdeed13f411']));

echo PHP_EOL . 'Your bank details are .... ' . PHP_EOL . 'Bank account no: ' . $ledger->getAccountNumber() . PHP_EOL .  'Sort code: ' . $ledger->getSortCode() . PHP_EOL . 'Status: ' . $ledger->getStatus() . PHP_EOL . 'Balance: ' . $ledger->getCurrentBalance() . PHP_EOL;
