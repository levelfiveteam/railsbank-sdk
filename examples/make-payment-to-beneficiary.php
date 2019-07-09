<?php
require_once '../vendor/autoload.php';

use Railsbank\Command\Transaction\CreateTransaction;
use Railsbank\Entity\Transaction\TransactionId;
use Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

$command = new CreateTransaction(
    [
        'reference' => 'Testing from script',
        'amount' => '0.69',
        'ledger_from_id' => '5d0cddf5-5b7d-4cc7-9992-18197cbe401f',
        'beneficiary_id' => '5d1c7e03-8162-431e-a11d-5ba4724955ba',
    ]
);

/** @var TransactionId $transaction */
$transaction = $railsbank->handle($command);

echo PHP_EOL . 'Your transaction id is: ' . $transaction->getTransactionId();
