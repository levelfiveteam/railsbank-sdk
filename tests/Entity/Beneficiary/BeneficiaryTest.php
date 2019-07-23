<?php

namespace Test\Entity\Beneficiary;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Beneficiary\Beneficiary;

class BeneficiaryTest extends TestCase
{
    public function testBeneficiary()
    {
        $response = [
            'beneficiary_id' => '1234',
            'iban' => 'GB1234111000',
            'bic_swift' => 'GB1',
            'last_modified_at' => '2019-01-02',
            'beneficiary_status' => 'active',
            'uk_sort_code' => '10-00-11',
            'uk_account_number' => '10021100',
            'bank_name' => 'Starling',
            'person' => [
                'name' => 'John Smith',
            ],
        ];

        $entity = new Beneficiary($response);

        self::assertEquals('1234', $entity->getBeneficiaryId());
        self::assertEquals('GB1234111000', $entity->getIban());
        self::assertEquals('GB1', $entity->getBicSwift());
        self::assertEquals('2019-01-02', $entity->getLastModifiedAt());
        self::assertEquals('active', $entity->getBeneficiaryStatus());
        self::assertEquals('10-00-11', $entity->getSortCode());
        self::assertEquals('10021100', $entity->getAccountNumber());
        self::assertEquals('Starling', $entity->getBankName());
        self::assertEquals('John Smith', $entity->getPersonName());
    }
}
