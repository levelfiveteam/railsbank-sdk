<?php

namespace Test\Command\Customer\Endusers;

use Railsbank\Command\Beneficiary\CreateBeneficiary;
use Test\CommandOrQueryTest;

class CreateBeneficiaryTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = CreateBeneficiary::class;
    }

    public function getCommandInputs() : array
    {
        return [
            'No input returns error' => [
                'error_expected' => true,
                'input' => [],
            ],
            'full information' => [
                'error_expected' => false,
                'input' => [
                    'holder_id' => '1234',
                    'uk_account_number' => '10020291',
                    'uk_sort_code' => '120010',
                    'person_name' => 'Mr Bob Smith',
                ],
            ],
        ];
    }
}
