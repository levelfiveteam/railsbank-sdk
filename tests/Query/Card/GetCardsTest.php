<?php

namespace Test\Query\Card;

use Railsbank\Query\Card\GetCards;
use Test\CommandOrQueryTest;

class GetCardsTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetCards::class;
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
