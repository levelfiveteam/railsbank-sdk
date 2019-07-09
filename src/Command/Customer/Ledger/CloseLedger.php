<?php

namespace Railsbank\Command\Customer\Ledger;

use Railsbank\Command;
use Railsbank\CommandInterface;

/**
 * Class CloseLedger
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
