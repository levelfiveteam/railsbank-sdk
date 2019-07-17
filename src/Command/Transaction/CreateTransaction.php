<?php
namespace Railsbank\Command\Transaction;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

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
            'reference' => $this->input->get('reference')->getValue(),
            'payment_type' => 'payment-type-UK-FasterPayments',
            'amount' => $this->input->get('amount')->getValue(),
            'ledger_from_id' => $this->input->get('ledger_from_id')->getValue(),
            'beneficiary_id' => $this->input->get('beneficiary_id')->getValue(),
        ];
    }
}
