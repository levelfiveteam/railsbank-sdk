<?php

namespace LevelFiveTeam\Railsbank\CommandHandler\Card;

use LevelFiveTeam\Railsbank\Command\Card\CreateCard;
use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class CreateCardHandler
 * @package LevelFiveTeam\Railsbank\CommandHandler\Card
 */
class CreateCardHandler extends Handler
{
    /**
     * @param CreateCard $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateCard(CreateCard $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST');
        return $beneficiary;
    }
}
