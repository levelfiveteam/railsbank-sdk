<?php

namespace Test\Entity\Customer;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Customer\GetLedger;

class GetLedgerTest extends TestCase
{
    public function testGetLedger()
    {
        $response = [
            'iban' => 'GB1100001111GB',
            'uk_sort_code' => '10-10-11',
            'bic_swift' => '10023',
            'uk_account_number' => '10200111',
            'amount' => '103032.22',
            'asset_class' => 'UKGBP',
            'asset_type' => 'currency',
            'created_at' => '2019-01-01',
            'holder_id' => '1234',
            'last_modified_at' => '2019-03-22',
            'ledger_status' => 'ledger-status-ok',
        ];

        $entity = new GetLedger($response);

        self::assertEquals('GB1100001111GB', $entity->getIban());
        self::assertEquals('10-10-11', $entity->getSortCode());
        self::assertEquals('10023', $entity->getBicSwift());
        self::assertEquals('10200111', $entity->getAccountNumber());
        self::assertEquals('103032.22', $entity->getAmount());
        self::assertEquals('UKGBP', $entity->getAssetClass());
        self::assertEquals('currency', $entity->getAssetType());
        self::assertEquals('2019-01-01', $entity->getCreatedAt());
        self::assertEquals('1234', $entity->getHolderId());
        self::assertEquals('103032.22', $entity->getCurrentBalance());
        self::assertEquals('ledger-status-ok', $entity->getStatus());
        self::assertTrue($entity->isLedgerStatusOk());
    }
}
