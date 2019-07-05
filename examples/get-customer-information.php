<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Query\Customer\GetEnduser;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

$command = new GetEnduser(['enduser_id' => '5d0cddf5-092d-436e-94b5-64ea32e29035']);

/** @var \LevelFiveTeam\Railsbank\Entity\Customer\EndUsers\EndUser $person */
$person = $railsbank->handle($command);

echo 'Name: ' . $person->getPerson()->getName();
echo PHP_EOL;
echo 'ID: ' . $person->getEndUserId();
echo PHP_EOL;
echo count($person->getLedgers());
