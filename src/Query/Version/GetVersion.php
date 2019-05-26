<?php
namespace LevelFiveTeam\Railsbank\Query\Version;

use LevelFiveTeam\Railsbank\Query\Query;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class GetVersion extends Query implements QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }
}
