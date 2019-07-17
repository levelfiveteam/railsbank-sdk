<?php

namespace Test\Entity\Version;

use Railsbank\Entity\Version\VersionNumber;
use PHPUnit\Framework\TestCase;

class VersionNumberTest extends TestCase
{
    public function testVersionNumber()
    {
        $response = ['version' => '1.2.3'];
        $entity = new VersionNumber($response);

        self::assertEquals('1.2.3', $entity->getVersion());
        self::assertEquals($response, $entity->getRawResponse());
    }
}
