<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Beneficiary\CreateBeneficiary;
use LevelFiveTeam\Railsbank\Railsbank;

$railsbank = new Railsbank('demo.config.php', 'live_account');

$command = new CreateBeneficiary(
    [
        'uk_account_number' => '77630500',
        'uk_sort_code' => '090127',
        'person_name' => 'Mr R S Binning',
    ]
);

/** @var \LevelFiveTeam\Railsbank\Entity\Beneficiary\BeneficiaryId $beneficiary */
$beneficiary = $railsbank->handle($command);

echo PHP_EOL . 'Your beneficiary id is: ' . $beneficiary->getBeneficiaryId();
