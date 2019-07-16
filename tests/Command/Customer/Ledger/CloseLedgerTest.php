<?php

namespace Test\Command\Customer\Endusers;

use Railsbank\Command\Customer\Ledger\CloseLedger;
use Test\CommandOrQueryTest;

class CloseLedgerTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = CloseLedger::class;
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
                    'ledger_id' => '1234',
                ],
                'expected_body' => [
                    'ledger_id' => '1234',
                ]
            ],
        ];
    }
}
