<?php
namespace LevelFiveTeam\Railsbank\Query\Card;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class GetCards extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }

    public function getBody(): ?array
    {
        return [];
    }
}
