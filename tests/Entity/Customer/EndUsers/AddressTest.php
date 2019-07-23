<?php

namespace Test\Entity\Customer\EndUsers;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Customer\EndUsers\Address;

class AddressTest extends TestCase
{
    public function testAddress()
    {
        $response = [
            'addressCity' => 'London',
            'addressIsoCountry' => '32',
            'addressNumber' => '55',
            'addressPostalCode' => 'ME8 6PG',
            'addressRefinement' => '55 Test Road, London, ME8 6PG, UK',
            'addressRegion' => 'Kent',
            'addressStreet' => 'Test Road',
        ];

        $entity = new Address($response);

        self::assertEquals('London', $entity->getAddressCity());
        self::assertEquals('32', $entity->getAddressIsoCountry());
        self::assertEquals('55', $entity->getAddressNumber());
        self::assertEquals('ME8 6PG', $entity->getAddressPostalCode());
        self::assertEquals('55 Test Road, London, ME8 6PG, UK', $entity->getAddressRefinement());
        self::assertEquals('Kent', $entity->getAddressRegion());
        self::assertEquals('Test Road', $entity->getAddressStreet());
    }
}
