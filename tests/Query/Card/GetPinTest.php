<?php

namespace Test\Query\Card;

use Railsbank\Query\Card\GetPin;
use Test\CommandOrQueryTest;

class GetPinTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetPin::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws error' => [
                true,
                [],
            ],
            'provide card id is valid' => [
                false,
                [ 'card_id' => '1234', ],
                [ 'card_id' => '1234', ],
            ],
        ];
    }
}
