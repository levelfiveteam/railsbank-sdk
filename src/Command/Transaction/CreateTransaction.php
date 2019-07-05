<?php
namespace LevelFiveTeam\Railsbank\Command\Transaction;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class CreateTransaction extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [
            'reference' => [ 'required' => true ],
            'amount' => [ 'required' => true, ],
            'ledger_from_id' => [ 'required' => true , ],
            'beneficiary_id' => [ 'required' => true , ],
        ];
    }

    public function getBody(): ?array
    {
        return [
            'payment_type' => 'payment-type-UK-FasterPayments',
            'amount' => $this->input->get('amount')->getValue(),
            'ledger_from_id' => $this->input->get('ledger_from_id')->getValue(),
            'beneficiary_id' => $this->input->get('beneficiary_id')->getValue(),
        ];
    }
}