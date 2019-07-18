<?php

namespace Test\Query\Me;

use Railsbank\Query\Me\Information;
use Test\CommandOrQueryTest;

class InformationTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = Information::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws error' => [
                false,
                [],
            ],
        ];
    }
}
