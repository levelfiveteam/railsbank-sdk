<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Customer\Ledger\CloseLedger;
use LevelFiveTeam\Railsbank\Entity\Customer\Ledger;
use LevelFiveTeam\Railsbank\Railsbank;

$ledgerId = $argv[1];

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

/** @var Ledger $ledger */
$ledger = $railsbank->handle(new CloseLedger(['ledger_id' => $ledgerId]));
echo 'Ledger: ' . $ledger->getLedgerId();
