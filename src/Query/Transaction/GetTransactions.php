<?php
namespace LevelFiveTeam\Railsbank\Query\Transaction;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class GetTransactions extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [
            'ledger_id' => [ 'required' => true ],
        ];
    }

    public function getBody(): ?array
    {
        return ['ledger_id' => $this->input->get('ledger_id')->getValue()];
    }
}
