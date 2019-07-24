<?php

namespace Test\Entity\Customer\EndUsers;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Customer\Ledger;

class LedgerTest extends TestCase
{
    public function testLedger()
    {
        $response = [
            'ledger_id' => '1234',
        ];

        $entity = new Ledger($response);

        self::assertEquals('1234', $entity->getLedgerId());
    }
}
