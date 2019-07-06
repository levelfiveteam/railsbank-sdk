<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Customer\Ledger\CloseLedger;
use LevelFiveTeam\Railsbank\Entity\Customer\Ledger;
use LevelFiveTeam\Railsbank\Railsbank;

$ledgerId = $argv[1];

$railsbank = new Railsbank('demo.config.php', 'live_account');

/** @var Ledger $ledger */
$ledger = $railsbank->handle(new CloseLedger(['ledger_id' => $ledgerId]));
echo 'Ledger: ' . $ledger->getLedgerId();
