<?php

namespace LevelFiveTeam\Railsbank\Command\Customer\Ledger;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;

/**
 * Class CloseLedger
 * @package LevelFiveTeam\Railsbank\Command\Customer\Ledger
 */
class CloseLedger extends Command implements CommandInterface
{
    public function getBody() : array
    {
        return [
            'ledger_id' => $this->input->get('ledger_id')->getValue(),
        ];
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification() : array
    {
        return [
            'ledger_id' => [ 'required' => true, ],
        ];
    }
}