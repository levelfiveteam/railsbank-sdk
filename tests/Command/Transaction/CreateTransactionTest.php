<?php

namespace Test\Command\Transaction;

use Railsbank\Command\Transaction\CreateTransaction;
use Test\CommandOrQueryTest;

class CreateTransactionTest extends CommandOrQueryTest
{
    public function setUp(): void
    {
        $this->command = CreateTransaction::class;
    }

    public function getCommandInputs() : array
    {
        return [
            'No input returns error' => [
                'error_expected' => true,
                'input' => [],
            ],
            'Full command working' => [
                'error_expected' => false,
                'input' => [
                    'reference' => 'Paying Friend',
                    'amount' => '120.33',
                    'ledger_from_id' => '1234',
                    'beneficiary_id' => '8292',
                ],
                'expected_response' => [
                    'reference' => 'Paying Friend',
                    'amount' => '120.33',
                    'ledger_from_id' => '1234',
                    'beneficiary_id' => '8292',
                    'payment_type' => 'payment-type-UK-FasterPayments',
                ],
            ],
        ];
    }
}
