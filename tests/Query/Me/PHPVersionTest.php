<?php

namespace Test\Query\Me;

use Railsbank\Query\Me\PHPVersion;
use Test\CommandOrQueryTest;

class PHPVersionTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = PHPVersion::class;
    }

    public function getCommandInputs(): array
    {
        return [
            'no input throws error' => [
                false,
                [],
                [],
            ],
        ];
    }
}
