<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Query\Card\GetPin;
use LevelFiveTeam\Railsbank\Entity\Card\Pin;
use LevelFiveTeam\Railsbank\Railsbank;

$cardId = $argv[1];

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

/** @var Pin $response */
$card = $railsbank->handle(new GetPin(['card_id' => $cardId]));
echo 'PIN: ' . $card->getPin();
