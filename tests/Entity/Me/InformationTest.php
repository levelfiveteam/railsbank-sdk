<?php

namespace Test\Entity\Me;

use Railsbank\Entity\Me\Information;
use PHPUnit\Framework\TestCase;

class InformationTest extends TestCase
{
    public function testInformation()
    {
        $response = [
            'customer_id' => '321112',
            'metacustomer_id' => '32222',
            'customer_status' => 'active',
            'customer_access_level' => '123',
            'company' => [
                'name' => 'Level 5',
            ],
        ];

        $entity = new Information($response);

        self::assertEquals('321112', $entity->getId());
        self::assertEquals('32222', $entity->getMetaCustomerId());
        self::assertEquals('active', $entity->getStatus());
        self::assertEquals('123', $entity->getAccessLevel());
        self::assertEquals('Level 5', $entity->getCompanyName());
        self::assertEquals($response, $entity->getRawResponse());
    }
}
