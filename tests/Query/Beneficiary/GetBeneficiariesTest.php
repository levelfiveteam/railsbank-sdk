<?php

namespace Test\Query\Beneficiary;

use Railsbank\Query\Beneficiary\GetBeneficiaries;
use Test\CommandOrQueryTest;

class GetBeneficiariesTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetBeneficiaries::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws error' => [
                true,
                [],
            ],
            'provide card id is valid' => [
                false,
                [ 'holder_id' => '1234', ],
                [ 'holder_id' => '1234', ],
            ],
        ];
    }
}
