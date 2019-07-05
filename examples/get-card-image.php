<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Entity\Card\CardImage;
use LevelFiveTeam\Railsbank\Query\Card\GetCardImageUrl;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

/** @var CardImage $card */
$card = $railsbank->handle(new GetCardImageUrl(['card_id' => '5d14e91c-8708-4de1-a5a1-bfdd866c7040']));

echo 'Card: ' . $card->getTempImageUrl();
echo PHP_EOL . PHP_EOL;

