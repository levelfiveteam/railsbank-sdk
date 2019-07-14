<?php

namespace Test\Command\Card;

use Railsbank\Command\Card\CreateCard;
use Test\CommandOrQueryTest;

class CreateCardTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = CreateCard::class;
    }

    public function getCommandInputs() : array
    {
        return [
            'No input returns error' => [
                'error_expected' => true,
                'input' => [],
            ],
            'minimal information should pass' => [
                'error_expected' => false,
                'input' => [
                    'ledger_id' => 'test12343',
                    'card_programme' => 'GBP',
                ],
            ],
        ];
    }
}
