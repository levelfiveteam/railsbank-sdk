<?php

namespace Railsbank\CommandHandler\Card;

use Railsbank\Command\Card\CreateCard;
use Railsbank\Handler;
use Railsbank\RailsbankClient;

/**
 * Class CreateCardHandler
 * @package Railsbank\CommandHandler\Card
 */
class CreateCardHandler extends Handler
{
    /**
     * @param CreateCard $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateCard(CreateCard $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST');
        return $beneficiary;
    }
}
