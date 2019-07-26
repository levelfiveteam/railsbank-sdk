<?php

namespace Test\Entity\Transaction;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Transaction\Transaction;

class TransactionTest extends TestCase
{
    public function testTransaction()
    {
        $response = [
            'created_at' => '2019-01-01',
            'ledger_entry_id' => '1233123-123123-21321',
            'transaction_id' => '123123',
            'amount' => '123.22',
            'ledger_entry_type' => 'cash',
        ];

        $entity = new Transaction($response);

        self::assertEquals('2019-01-01', $entity->getCreatedAt());
        self::assertEquals('1233123-123123-21321', $entity->getLedgerEntryId());
        self::assertEquals('123123', $entity->getTransactionId());
        self::assertEquals('123.22', $entity->getAmount());
        self::assertEquals('cash', $entity->getLedgerEntryType());
    }
}
