<?php

namespace Test\Entity\Beneficiary;

use Railsbank\Entity\Beneficiary\Beneficiaries;
use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Beneficiary\Beneficiary;

class BeneficiariesTest extends TestCase
{
    public function testOneBenficiary()
    {
        $response = [
            [
                'beneficiary_id' => '1234',
                'iban' => 'GB1234111000',
                'bic_swift' => 'GB1',
                'last_modified_at' => '2019-01-02',
                'beneficiary_status' => 'active',
                'uk_sort_code' => '10-00-11',
                'uk_account_number' => '10021100',
                'bank_name' => 'Starling',
            ],
        ];

        $entity = new Beneficiaries($response);

        self::assertEquals(1, count($entity->getBeneficiaries()));
    }

    public function testTwoBenficiary()
    {
        $response = [
            [
                'beneficiary_id' => '1234',
                'iban' => 'GB1234111000',
                'bic_swift' => 'GB1',
                'last_modified_at' => '2019-01-02',
                'beneficiary_status' => 'active',
                'uk_sort_code' => '10-00-11',
                'uk_account_number' => '10021100',
                'bank_name' => 'Starling',
            ],
            [
                'beneficiary_id' => '123433',
                'iban' => 'GB12341110001',
                'bic_swift' => 'GB112',
                'last_modified_at' => '2019-01-02',
                'beneficiary_status' => 'inactive',
                'uk_sort_code' => '10-00-11',
                'uk_account_number' => '10021300',
                'bank_name' => 'Starling',
            ],
        ];

        $entity = new Beneficiaries($response);

        self::assertEquals(2, count($entity->getBeneficiaries()));

        foreach ($entity->getBeneficiaries() as $beneficiary) {
            self::assertInstanceOf(Beneficiary::class, $beneficiary);
        }
    }
}
