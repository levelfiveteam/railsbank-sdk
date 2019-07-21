<?php

namespace Test\Entity\Beneficiary;

use Railsbank\Entity\Card\Pin;
use PHPUnit\Framework\TestCase;

class PinTest extends TestCase
{
    public function testGetPin()
    {
        $response = [
            'pin' => '0827',
        ];

        $entity = new Pin($response);

        self::assertEquals('0827', $entity->getPin());
    }
}
