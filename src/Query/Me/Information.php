<?php
namespace LevelFiveTeam\Railsbank\Query\Me;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class Information extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }

    public function getBody() :? array
    {
        //
    }
}
