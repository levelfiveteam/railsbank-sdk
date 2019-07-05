<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Entity\Card\Card;
use LevelFiveTeam\Railsbank\Query\Card\GetCard;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

/** @var Card $response */
$card = $railsbank->handle(new GetCard(['card_id' => '5d14e91c-8708-4de1-a5a1-bfdd866c7040']));

echo 'Card: ' . $card->getCardId();
echo PHP_EOL;
echo 'Card token: ' . $card->getCardToken();
echo PHP_EOL;
echo 'Card ledger ID: ' . $card->getLedgerId();
echo PHP_EOL . PHP_EOL;

