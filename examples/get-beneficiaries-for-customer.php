<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Query\Beneficiary\GetBeneficiaries;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

/** @var \LevelFiveTeam\Railsbank\Entity\Beneficiary\Beneficiaries $response */
$response = $railsbank->handle(new GetBeneficiaries(['holder_id' => '5d0cddf5-092d-436e-94b5-64ea32e29035',]));

/** @var \LevelFiveTeam\Railsbank\Entity\Beneficiary\Beneficiary $beneficiary */
foreach ($response->getBeneficiaries() as $beneficiary) {
    echo 'Beneficiary ID: ' . $beneficiary->getBeneficiaryId();
    echo PHP_EOL;
    echo 'IBAN: ' . $beneficiary->getIban();
    echo PHP_EOL;
    echo 'Account Number: ' . $beneficiary->getAccountNumber();
    echo PHP_EOL;
    echo 'Sort code: ' . $beneficiary->getSortCode();
    echo PHP_EOL . PHP_EOL;
}
