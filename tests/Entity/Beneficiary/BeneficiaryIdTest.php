<?php

namespace Test\Entity\Beneficiary;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Beneficiary\BeneficiaryId;

class BeneficiaryIdTest extends TestCase
{
    public function testBeneficiaryId()
    {
        $response = [
            'beneficiary_id' => '1234',
        ];

        $entity = new BeneficiaryId($response);

        self::assertEquals('1234', $entity->getBeneficiaryId());
    }
}
