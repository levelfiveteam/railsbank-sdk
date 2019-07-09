<?php
require_once '../vendor/autoload.php';

use Railsbank\Query\Card\GetCards;
use Railsbank\Entity\Card\Cards;
use Railsbank\Entity\Card\Card;
use Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

/** @var Cards $response */
$response = $railsbank->handle(new GetCards());

/** @var Card $card */
foreach ($response->getCards() as $card) {
    echo 'Card: ' . $card->getCardId();
    echo PHP_EOL;
    echo 'Card token: ' . $card->getCardToken();
    echo PHP_EOL;
    echo 'Card ledger ID: ' . $card->getLedgerId();
    echo PHP_EOL . PHP_EOL;
}
