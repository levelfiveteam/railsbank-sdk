<?php

namespace Test\Query\Card;

use Railsbank\Query\Card\GetCard;
use Test\CommandOrQueryTest;

class GetCardTest extends CommandOrQueryTest
{
    public function setUp(): void
    {
        $this->command = GetCard::class;
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
