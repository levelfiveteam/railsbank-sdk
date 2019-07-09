<?php

namespace Railsbank\CommandHandler\Customer\Endusers;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Command\Customer\EndUsers\CreatePerson;

/**
 * Class PersonHandler
 */
class CreatePersonHandler extends Handler
{
    /**
     * @param CreatePerson $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleCreatePerson(CreatePerson $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $person = $client->handleApiCall($command, 'POST');
        return $person;
    }
}
