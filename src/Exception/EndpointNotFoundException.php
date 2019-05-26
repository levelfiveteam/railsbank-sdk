<?php

namespace LevelFiveTeam\Railsbank\Exception;

use LevelFiveTeam\Railsbank\CommandInterface;

class EndpointNotFoundException extends \Exception
{
    public function __construct(CommandInterface $command)
    {
        parent::__construct('Endpoint for ' . get_class($command) . ' not found', 500);
    }
}
