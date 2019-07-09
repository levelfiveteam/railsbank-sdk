<?php
namespace Railsbank\Query\Card;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

class GetCardImageUrl extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [
            'card_id' => [
                'required' => true,
            ]
        ];
    }

    public function getBody(): ?array
    {
        return [
            'card_id' => $this->input->get('card_id')->getValue(),
        ];
    }
}
