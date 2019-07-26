<?php

namespace Test\Entity\Transaction;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Transaction\Transaction;
use Railsbank\Entity\Transaction\Transactions;

class TransactionsTest extends TestCase
{
    public function testTransaction()
    {
        $response = [
            [
                'created_at' => '2019-01-01',
                'ledger_entry_id' => '1233123-123123-21321',
                'transaction_id' => '123123',
                'amount' => '123.22',
                'ledger_entry_type' => 'cash',
            ],
            [
                'created_at' => '2019-03-03',
                'ledger_entry_id' => '1233213-1232123-21321',
                'transaction_id' => '123153',
                'amount' => '2.22',
                'ledger_entry_type' => 'cash',
            ]
        ];

        $entity = new Transactions($response);

        self::assertEquals(2, count($entity->getTransactions()));

        foreach ($entity->getTransactions() as $transaction) {
            self::assertInstanceOf(Transaction::class, $transaction);
        }
    }
}
