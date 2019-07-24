<?php

namespace Test\Entity\Customer\EndUsers;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Customer\EndUsers\Address;
use Railsbank\Entity\Customer\EndUsers\EndUser;
use Railsbank\Entity\Customer\EndUsers\Person;

class EndUserTest extends TestCase
{
    public function testEndUser()
    {
        $response = [
            'created_at' => '2019-01-01',
            'enduser_id' => '1234',
            'enduser_meta' => 'test@testemail.com',
            'enduser_status' => 'enduser-status-ok',
            'entity_type' => 'person',
            'last_modified_at' => '2019-05-01',
            'screening_monitored_search' => true,
            'person' => [
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
            ],
            'ledgers' => [
                [
                    'ledger_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
                ],
                [
                    'ledger_id' => 'bb8b2428-f94c-41df-8e82-a895ab4112221',
                ],
                [
                    'ledger_id' => 'bb8b2428-f94c-41df-8e82-adsad14d6ac8',
                ]
            ],
            'beneficiaries' => [
                [
                    'beneficiary_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6333',
                ],
            ],

        ];

        $entity = new EndUser($response);

        self::assertEquals('2019-01-01', $entity->getCreatedAt());
        self::assertEquals('1234', $entity->getEndUserId());
        self::assertEquals('test@testemail.com', $entity->getMetaData());
        self::assertEquals('enduser-status-ok', $entity->getEnduserStatus());
        self::assertEquals('person', $entity->getEntityType());
        self::assertEquals('2019-05-01', $entity->getLastModifiedAt());

        self::assertEquals(
            [
                [
                    'ledger_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
                ],
                [
                    'ledger_id' => 'bb8b2428-f94c-41df-8e82-a895ab4112221',
                ],
                [
                    'ledger_id' => 'bb8b2428-f94c-41df-8e82-adsad14d6ac8',
                ]
            ],
            $entity->getLedgers()
        );


        self::assertEquals(
            [
                [
                    'beneficiary_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6333',
                ]
            ],
            $entity->getBeneficiaries()
        );

        self::assertEquals(true, $entity->isScreenMonitoredSearch());

        $person = $entity->getPerson();

        self::assertInstanceOf(Person::class, $person);

        self::assertEquals('1980-07-11', $person->getDateOfBirth());
        self::assertEquals('2019-01-01', $person->getDateOnboarded());
        self::assertEquals('test@testemail.com', $person->getEmail());
        self::assertEquals('John Smith', $person->getName());
        self::assertEquals('AA1231111', $person->getSocialSecurityNumber());
        self::assertEquals('03331011011', $person->getTelephone());

        $address = $person->getAddress();

        self::assertInstanceOf(Address::class, $address);

        self::assertEquals('London', $address->getAddressCity());
        self::assertEquals('32', $address->getAddressIsoCountry());
        self::assertEquals('55', $address->getAddressNumber());
        self::assertEquals('ME8 6PG', $address->getAddressPostalCode());
        self::assertEquals('55 Test Road, London, ME8 6PG, UK', $address->getAddressRefinement());
        self::assertEquals('Kent', $address->getAddressRegion());
        self::assertEquals('Test Road', $address->getAddressStreet());
    }
}
