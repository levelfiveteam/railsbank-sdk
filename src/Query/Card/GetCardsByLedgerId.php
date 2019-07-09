<?php
namespace Railsbank\Query\Card;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

class GetCardsByLedgerId extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [
            'ledger_id' => [
                'required' => true,
            ]
        ];
    }

    public function getBody(): ?array
    {
        return [
            'ledger_id' => $this->input->get('ledger_id')->getValue(),
        ];
    }
}
