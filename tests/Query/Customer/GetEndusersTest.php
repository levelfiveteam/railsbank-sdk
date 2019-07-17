<?php

namespace Test\Query\Customer;

use Railsbank\Query\Customer\GetEndusers;
use Test\CommandOrQueryTest;

class GetEndusersTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetEndusers::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws no error' => [
                false,
                [],
                [],
            ],
        ];
    }
}
