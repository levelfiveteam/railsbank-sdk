<?php

namespace Test\Query\Card;

use Railsbank\Query\Card\GetCardImageUrl;
use Test\CommandOrQueryTest;

class GetCardImageUrlTest extends CommandOrQueryTest
{
    public function setUp(): void
    {
        $this->command = GetCardImageUrl::class;
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
