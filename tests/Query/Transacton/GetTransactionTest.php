<?php

namespace Test\Query\Transaction;

use Railsbank\Query\Transaction\GetTransaction;
use Test\CommandOrQueryTest;

class GetTransactionTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetTransaction::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws error' => [
                true,
                [],
            ],
            'provide transaction id is valid' => [
                false,
                [ 'transaction_id' => '1234', ],
                [ 'transaction_id' => '1234', ],
            ],
        ];
    }
}
