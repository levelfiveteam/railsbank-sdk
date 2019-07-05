<?php
namespace LevelFiveTeam\Railsbank\Query\Version;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;

class GetVersion extends Command implements CommandInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }

    public function getBody()
    {
        //
    }
}
