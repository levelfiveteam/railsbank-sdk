<?php

namespace Test\Entity\Customer\EndUsers;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Customer\EndUsers\Person;

class PersonTest extends TestCase
{
    public function testPerson()
    {
        $response = [
            'date_of_birth' => '1980-07-11',
            'date_onboarded' => '2019-01-01',
            'email' => 'test@testemail.com',
            'name' => 'John Smith',
            'social_security_number' => 'AA1231111',
            'telephone' => '03331011011',
            'address' => [
                'addressCity' => 'London',
                'addressIsoCountry' => '32',
                'addressNumber' => '55',
                'addressPostalCode' => 'ME8 6PG',
                'addressRefinement' => '55 Test Road, London, ME8 6PG, UK',
                'addressRegion' => 'Kent',
                'addressStreet' => 'Test Road',
            ],
        ];

        $entity = new Person($response);

        self::assertEquals('1980-07-11', $entity->getDateOfBirth());
        self::assertEquals('2019-01-01', $entity->getDateOnboarded());
        self::assertEquals('test@testemail.com', $entity->getEmail());
        self::assertEquals('John Smith', $entity->getName());
        self::assertEquals('AA1231111', $entity->getSocialSecurityNumber());
        self::assertEquals('03331011011', $entity->getTelephone());

        self::assertEquals('London', $entity->getAddress()->getAddressCity());
        self::assertEquals('32', $entity->getAddress()->getAddressIsoCountry());
        self::assertEquals('55', $entity->getAddress()->getAddressNumber());
        self::assertEquals('ME8 6PG', $entity->getAddress()->getAddressPostalCode());
        self::assertEquals('55 Test Road, London, ME8 6PG, UK', $entity->getAddress()->getAddressRefinement());
        self::assertEquals('Kent', $entity->getAddress()->getAddressRegion());
        self::assertEquals('Test Road', $entity->getAddress()->getAddressStreet());
    }
}
