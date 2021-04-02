<?php

namespace Test\Query\Customer;

use Railsbank\Query\Customer\GetLedger;
use Test\CommandOrQueryTest;

class GetLedgerTest extends CommandOrQueryTest
{
    public function setUp(): void
    {
        $this->command = GetLedger::class;
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
                [ 'ledger_id' => '1234', ],
                [ 'ledger_id' => '1234', ],
            ],
        ];
    }
}
