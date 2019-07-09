<?php
namespace Railsbank\Query\Transaction;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

class GetTransaction extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [
            'transaction_id' => [ 'required' => true ],
        ];
    }

    public function getBody(): ?array
    {
        return ['transaction_id' => $this->input->get('transaction_id')->getValue()];
    }
}
