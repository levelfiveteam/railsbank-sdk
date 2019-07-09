<?php
require_once '../vendor/autoload.php';

use Railsbank\Query\Transaction\GetTransactions;
use Railsbank\Railsbank;

$ledgerId = $argv[1];

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}


/** @var \Railsbank\Entity\Transaction\Transactions $response */
$response = $railsbank->handle(new GetTransactions(['ledger_id' => $ledgerId]));

var_dump($response);
