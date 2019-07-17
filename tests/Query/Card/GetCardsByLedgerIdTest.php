<?php

namespace Test\Query\Card;

use Railsbank\Query\Card\GetCardsByLedgerId;
use Test\CommandOrQueryTest;

class GetCardsByLedgerIdTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetCardsByLedgerId::class;
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
