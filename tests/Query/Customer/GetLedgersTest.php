<?php

namespace Test\Query\Customer;

use Railsbank\Query\Customer\GetLedgers;
use Test\CommandOrQueryTest;

class GetLedgersTest extends CommandOrQueryTest
{
    public function setUp(): void
    {
        $this->command = GetLedgers::class;
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
