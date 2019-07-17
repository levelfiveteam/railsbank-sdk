<?php

namespace Test\Command\Customer\Endusers;

use Railsbank\Command\Customer\EndUsers\CreatePerson;
use Railsbank\Helper\DateFormat;
use Test\CommandOrQueryTest;

class PersonTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = CreatePerson::class;
    }

    public function getCommandInputs() : array
    {
        return [
            'No input returns error' => [
                'error_expected' => true,
                'input' => [],
            ],
            'name only' => [
                'error_expected' => false,
                'input' => [
                    'name' => 'Gaurav Malhotra',
                ],
                'expected_response' => [
                    'person' => [
                        'address' => [
                            'address_iso_country' => null,
                            'address_number' => null,
                            'address_postal_code' => null,
                            'address_refinement' => null,
                            'address_region' => null,
                            'address_street' => null,
                            'address_city' => null,
                        ],
                        'country_of_residence' => [null],
                        'date_onboarded' => (new DateFormat())->getCurrentDate(),
                        'date_of_birth' => null,
                        'email' => null,
                        'name' => 'Gaurav Malhotra',
                        'social_security_number' => null,
                        'telephone' => null,
                    ],
                    'enduser_meta' => null,
                ],
            ],
            'full information' => [
                'error_expected' => false,
                'input' => [
                    'address_city' => 'Kent',
                    'address_iso_country' => 'GB',
                    'address_number' => '55',
                    'address_postal_code' => 'ME8 6PG',
                    'address_refinement' => '55 Test Road, Ebbsfleet, Kent, ME8 6PG',
                    'address_region' => 'ME8',
                    'address_street' => 'Ebbsfleet',
                    'name' => 'Gaurav Malhotra',
                    'email' => 'gaurav@level5.co.uk',
                    'date_of_birth' => '1971-01-01',
                    'telephone' => '0282827272',
                    'address' => ['required' => false,],
                    'nationality' => 'British',
                    'country_of_residence' => 'GB',
                    'enduser_meta' => 'test123',
                    'social_security_number' => 'JH8819291',
                ],
                'expected_response' => [
                    'person' => [
                        'address' => [
                            'address_iso_country' => 'GB',
                            'address_number' => '55',
                            'address_postal_code' => 'ME8 6PG',
                            'address_refinement' => '55 Test Road, Ebbsfleet, Kent, ME8 6PG',
                            'address_region' => 'ME8',
                            'address_street' => 'Ebbsfleet',
                            'address_city' => 'Kent',
                        ],
                        'country_of_residence' => ['GB'],
                        'date_onboarded' => (new DateFormat())->getCurrentDate(),
                        'date_of_birth' => '1971-01-01',
                        'email' => 'gaurav@level5.co.uk',
                        'name' => 'Gaurav Malhotra',
                        'social_security_number' => 'JH8819291',
                        'telephone' => '0282827272',
                    ],
                    'enduser_meta' => 'test123',
                ],
            ],
        ];
    }
}
