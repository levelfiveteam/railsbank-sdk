<?php
require_once '../vendor/autoload.php';

use Railsbank\Entity\Card\CardId;
use Railsbank\Command\Card\CreateCard;
use Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

$command = new CreateCard(
    [
        'ledger_id' => '5d0cddf5-5b7d-4cc7-9992-18197cbe401f',
        'card_programme' => 'Kuflink GBP (Retail)',
    ]
);

/** @var CardId $transaction */
$card = $railsbank->handle($command);

echo PHP_EOL . 'Your card id is: ' . $card->getCardId();
