<?php

namespace LevelFiveTeam\Railsbank\CommandHandler\Customer\Endusers;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Command\Customer\EndUsers\CreatePerson;

/**
 * Class PersonHandler
 */
class CreatePersonHandler extends Handler
{
    /**
     * @param CreatePerson $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
     */
    public function handleCreatePerson(CreatePerson $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $person = $client->handleApiCall($command, 'POST');
        return $person;
    }
}
