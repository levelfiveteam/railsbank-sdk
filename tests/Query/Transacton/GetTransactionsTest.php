<?php

namespace Test\Query\Transaction;

use Railsbank\Query\Transaction\GetTransactions;
use Test\CommandOrQueryTest;

class GetTransactionsTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetTransactions::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws error' => [
                true,
                [],
            ],
            'provide ledger id is valid' => [
                false,
                [ 'ledger_id' => '1234', ],
                [ 'ledger_id' => '1234', ],
            ],
        ];
    }
}
