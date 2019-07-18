<?php

namespace Test\Query\Version;

use Railsbank\Query\Version\GetVersion;
use Test\CommandOrQueryTest;

class GetVersionTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = GetVersion::class;
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
