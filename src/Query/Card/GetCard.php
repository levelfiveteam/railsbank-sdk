<?php
namespace LevelFiveTeam\Railsbank\Query\Card;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class GetCard extends Command implements CommandInterface, QueryInterface
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
