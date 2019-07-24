<?php

namespace Test\Entity\Customer\EndUsers;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Customer\EndUsers\EndUserId;

class EndUserIdTest extends TestCase
{
    public function testEndUserId()
    {
        $response = [
            'enduser_id' => '1234',
        ];

        $entity = new EndUserId($response);

        self::assertEquals('1234', $entity->getEndUserId());
    }
}
