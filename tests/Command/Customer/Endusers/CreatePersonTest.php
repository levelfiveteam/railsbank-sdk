<?php

namespace Test\Command\Customer\Endusers;

use LevelFiveTeam\Railsbank\Command\Customer\EndUsers\CreatePerson;
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
                'expected_body' => [
                    'name' => ' Malhotra',
                ],
            ],
        ];
    }
}
