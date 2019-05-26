<?php
namespace LevelFiveTeam\Railsbank\Query\Me;

use LevelFiveTeam\Railsbank\Query\Query;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class Information extends Query implements QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }
}
