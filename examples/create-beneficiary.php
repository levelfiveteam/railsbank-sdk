<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Beneficiary\CreateBeneficiary;
use LevelFiveTeam\Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'live_account');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

$command = new CreateBeneficiary(
    [
        'holder_id' => '5d0cddf5-092d-436e-94b5-64ea32e29035',
        'uk_account_number' => '77630500',
        'uk_sort_code' => '090127',
        'person_name' => 'Mr R S Binning',
    ]
);

// First we register
/** @var \LevelFiveTeam\Railsbank\Entity\Beneficiary\BeneficiaryId $beneficiary */
$beneficiary = $railsbank->handle($command);

echo PHP_EOL . 'Your beneficiary id is: ' . $beneficiary->getBeneficiaryId();
