<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Query\Transaction\GetTransactions;
use LevelFiveTeam\Railsbank\Railsbank;

$ledgerId = $argv[1];

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}


/** @var \LevelFiveTeam\Railsbank\Entity\Transaction\Transactions $response */
$response = $railsbank->handle(new GetTransactions(['ledger_id' => $ledgerId]));

var_dump($response);
