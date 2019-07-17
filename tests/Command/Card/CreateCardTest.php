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
                'expected_result' => [
                    'ledger_id' => 'test12343',
                    'card_programme' => 'GBP',
                    'card_type' => 'virtual',
                    'card_design' => null,
                    'card_carrier_type' => null,
                    'card_delivery_method' => null,
                    'card_delivery_name' => null,
                    'card_rules' => '',
                    'address' => [
                        'address_city' => null,
                        'address_iso_country' => null,
                        'address_number' => null,
                        'address_postal_code' => null,
                        'address_refinement' => null,
                        'address_region' => null,
                        'address_street' => null,
                    ],
                ],
            ],
            'full information should pass' => [
                'error_expected' => false,
                'input' => [
                    'ledger_id' => 'test12343',
                    'card_programme' => 'GBP',
                    'card_type' => 'virtual',
                    'card_design' => 'the-best',
                    'card_carrier_type' => 'royal mail',
                    'card_delivery_method' => 'fast track',
                    'card_delivery_name' => 'Mr B Smith',
                    'card_rules' => 'rules123',
                    'address_iso_country' => 'GB',
                    'address_number' => '55',
                    'address_postal_code' => 'ME8 6PG',
                    'address_refinement' => '55 Test Road, Ebbsfleet, Kent, ME8 6PG',
                    'address_region' => 'ME8',
                    'address_street' => 'Ebbsfleet',
                    'address_city' => 'Kent',
                ],
                'expected_result' => [
                    'ledger_id' => 'test12343',
                    'card_programme' => 'GBP',
                    'card_type' => 'virtual',
                    'card_design' => 'the-best',
                    'card_carrier_type' => 'royal mail',
                    'card_delivery_method' => 'fast track',
                    'card_delivery_name' => 'Mr B Smith',
                    'card_rules' => '',
                    'address' => [
                        'address_iso_country' => 'GB',
                        'address_number' => '55',
                        'address_postal_code' => 'ME8 6PG',
                        'address_refinement' => '55 Test Road, Ebbsfleet, Kent, ME8 6PG',
                        'address_region' => 'ME8',
                        'address_street' => 'Ebbsfleet',
                        'address_city' => 'Kent',
                    ],
                ],
            ],
        ];
    }
}
