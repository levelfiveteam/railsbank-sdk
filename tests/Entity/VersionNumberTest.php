<?php

namespace Test\Entity;

use LevelFiveTeam\Railsbank\Entiity\VersionNumber;
use PHPUnit\Framework\TestCase;

class VersionNumberTest extends TestCase
{
    public function testVersionNumber()
    {
        $response = ['version' => '1.2.3'];
        $entity = new VersionNumber($response);

        self::assertEquals('1.2.3', $entity->getVersion());
    }
}
