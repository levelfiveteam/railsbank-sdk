<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Query\Card\GetCardsByLedgerId;
use LevelFiveTeam\Railsbank\Entity\Card\Cards;
use LevelFiveTeam\Railsbank\Entity\Card\Card;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

/** @var Cards $response */
$response = $railsbank->handle(new GetCardsByLedgerId(['ledger_id' => '5ced4e13-c20d-43da-9df4-b8c0731eccd0',]));

/** @var Card $card */
foreach ($response->getCards() as $card) {
    echo 'Card: ' . $card->getCardId();
    echo PHP_EOL;
    echo 'Card token: ' . $card->getCardToken();
    echo PHP_EOL;
    echo 'Card ledger ID: ' . $card->getLedgerId();
    echo PHP_EOL . PHP_EOL;
}
