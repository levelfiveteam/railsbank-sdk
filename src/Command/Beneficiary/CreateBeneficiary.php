<?php

namespace Railsbank\Command\Beneficiary;

use Railsbank\Command;
use Railsbank\CommandInterface;

/**
 * Class CreateBeneficiary
 * @package Railsbank\Command\Beneficiary\CreateBeneficiary
 */
class CreateBeneficiary extends Command implements CommandInterface
{
    public function getBody() : array
    {
        return [
            'holder_id' => $this->input->get('holder_id')->getValue(),
            'asset_class' => 'currency',
            'asset_type' => 'gbp',
            'uk_account_number' => $this->input->get('uk_account_number')->getValue(),
            'uk_sort_code' => $this->input->get('uk_sort_code')->getValue(),
            'person' => [
                'name' => $this->input->get('person_name')->getValue()
            ],
        ];
    }

    public function getInputFilterSpecification() : array
    {
        return [
            'holder_id' => [ 'required' => true, ],
            'uk_account_number' => [ 'required' => true, ],
            'uk_sort_code' => [ 'required' => true, ],
            'person_name' => [ 'required' => true, ],
        ];
    }
}
