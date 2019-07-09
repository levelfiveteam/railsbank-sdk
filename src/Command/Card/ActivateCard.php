<?php

namespace Railsbank\Command\Card;

use Railsbank\Command;
use Railsbank\CommandInterface;

/**
 * Class ActivateCard
 * @package Railsbank\Command\Card\ActivateCard
 */
class ActivateCard extends Command implements CommandInterface
{
    public function getBody() : array
    {
        return [
            'card_id' => $this->input->get('card_id')->getValue(),
        ];
    }

    public function getInputFilterSpecification() : array
    {
        return [
            'card_id' => [ 'required' => true, ],
        ];
    }
}
