<?php

namespace Test\Command\Card;

use Railsbank\Command\Card\ActivateCard;
use Test\CommandOrQueryTest;

class ActivateCardTest extends CommandOrQueryTest
{
    public function setUp(): void
    {
        $this->command = ActivateCard::class;
    }

    public function getCommandInputs() : array
    {
        return [
            'No input returns error' => [
                'error_expected' => true,
                'input' => [],
            ],
            'passing card id should be valid' => [
                'error_expected' => false,
                'input' => [
                    'card_id' => 'test12343',
                ],
                'response_body' => [
                    'card_id' => 'test12343',
                ],
            ],
        ];
    }
}
