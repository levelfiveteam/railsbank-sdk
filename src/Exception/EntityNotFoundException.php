<?php

namespace Railsbank\Exception;

use Railsbank\Command\CommandInterface;

class EntityNotFoundException extends \Exception
{
    public function __construct(CommandInterface $command)
    {
        parent::__construct('Entity for ' . get_class($command) . ' not found', 500);
    }
}
