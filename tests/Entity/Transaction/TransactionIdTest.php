<?php

namespace Test\Entity\Transaction;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Transaction\TransactionId;

class TransactionIdTest extends TestCase
{
    public function testTransaction()
    {
        $response = [
            'transaction_id' => '123123',
        ];

        $entity = new TransactionId($response);

        self::assertEquals('123123', $entity->getTransactionId());
    }
}
