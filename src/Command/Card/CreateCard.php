<?php

namespace Railsbank\Command\Card;

use Railsbank\Command;
use Railsbank\CommandInterface;

/**
 * Class CreateVirtualCard
 * @package Railsbank\Command\Card\CreateVirtualCard
 */
class CreateCard extends Command implements CommandInterface
{
    public function getBody() : array
    {
        return [
            'ledger_id' => $this->input->get('ledger_id')->getValue(),
            'card_programme' => $this->input->get('card_programme')->getValue(),
            'card_type' => ($this->input->get('card_type')->getValue())?: 'virtual',
            'card_design' => $this->input->get('card_design')->getValue(),
            'card_carrier_type' => $this->input->get('card_carrier_type')->getValue(),
            'card_delivery_method' => $this->input->get('card_delivery_method')->getValue(),
            'card_delivery_name' => $this->input->get('card_delivery_name')->getValue(),
            'card_rules' => '',
            'address' => [
                'address_city' => $this->input->get('address_city')->getValue(),
                'address_iso_country' => $this->input->get('address_iso_country')->getValue(),
                'address_number' => $this->input->get('address_number')->getValue(),
                'address_postal_code' => $this->input->get('address_postal_code')->getValue(),
                'address_refinement' => $this->input->get('address_refinement')->getValue(),
                'address_region' => $this->input->get('address_region')->getValue(),
                'address_street' => $this->input->get('address_street')->getValue(),
            ],
        ];
    }

    public function getInputFilterSpecification() : array
    {
        return [
            'ledger_id' => [ 'required' => true, ],
            'card_programme' => [ 'required' => true, ],
            'address_city' => ['required' => false,],
            'address_iso_country' => ['required' => false,],
            'address_number' => ['required' => false,],
            'address_postal_code' => ['required' => false,],
            'address_refinement' => ['required' => false,],
            'address_region' => ['required' => false,],
            'address_street' => ['required' => false,],
            'card_type' => [ 'required' => false, ],
            'card_design' => [ 'required' => false, ],
            'card_carrier_type' => ['required' => false, ],
            'card_delivery_method' => ['required' => false, ],
            'card_delivery_name' => [ 'required' => false, ],
        ];
    }
}
