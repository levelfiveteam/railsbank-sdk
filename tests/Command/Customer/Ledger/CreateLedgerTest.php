<?php

namespace Test\Command\Customer\Endusers;

use Railsbank\Command\Customer\Ledger\CreateLedger;
use Test\CommandOrQueryTest;

class CreateLedgerTest extends CommandOrQueryTest
{
    public function setUp()
    {
        $this->command = CreateLedger::class;
    }

    public function getCommandInputs() : array
    {
        return [
            'No input returns error' => [
                'error_expected' => true,
                'input' => [],
            ],
            'Just holder ID returns error' => [
                'error_expected' => true,
                'input' => [
                    'holder_id' => '1234',
                ],
            ],
            'Minimal command' => [
                'error_expected' => false,
                'input' => [
                    'holder_id' => '1234',
                    'partner_product' => 'test',
                ],
            ],
            'Full command working' => [
                'error_expected' => false,
                'input' => [
                    'holder_id' => '1234',
                    'partner_product' => 'test',
                    'asset_class' => 'currency',
                    'asset_type' => 'gbp',
                    'ledger_type' => 'ledger-type-omnibus',
                    'ledger_who_owns_assets' => 'ledger-assets-owned-by-me',
                    'ledger_primary_use_types' => ['ledger-primary-use-types-payments'],
                    'ledger_t_and_cs_country_of_jurisdiction' => 'GB'
                ],
            ],
        ];
    }
}
