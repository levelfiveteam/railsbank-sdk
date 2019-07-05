<?php

namespace LevelFiveTeam\Railsbank\Command\Customer\Ledger;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;

/**
 * Class CreateLedger
 * @package LevelFiveTeam\Railsbank\Command\Customer\Ledger
 */
class CreateLedger extends Command implements CommandInterface
{
    public function getBody() : array
    {
        return [
            'holder_id' => $this->input->get('holder_id')->getValue(),
            'partner_product' => $this->input->get('partner_product')->getValue(),
            'asset_class' => 'currency',
            'asset_type' => 'gbp',
            'ledger_type' => 'ledger-type-omnibus',
            'ledger_who_owns_assets' => 'ledger-assets-owned-by-me',
            'ledger_primary_use_types' => ['ledger-primary-use-types-payments'],
            'ledger_t_and_cs_country_of_jurisdiction' => 'GB'
        ];
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification() : array
    {
        return [
            'holder_id' => [ 'required' => true, ],
            'partner_product' => [ 'required' => true, ],
        ];
    }
}
