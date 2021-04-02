<?php

namespace Test\Query\Customer;

use Railsbank\Query\Customer\GetEnduser;
use Test\CommandOrQueryTest;

class GetEnduserTest extends CommandOrQueryTest
{
    public function setUp(): void
    {
        $this->command = GetEnduser::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws error' => [
                true,
                [],
            ],
            'provide enduser id is valid' => [
                false,
                [ 'enduser_id' => '1234', ],
                [ 'enduser_id' => '1234', ],
            ],
        ];
    }
}
