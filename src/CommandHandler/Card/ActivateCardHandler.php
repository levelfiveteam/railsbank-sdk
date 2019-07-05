<?php

namespace LevelFiveTeam\Railsbank\CommandHandler\Card;

use LevelFiveTeam\Railsbank\Command\Card\ActivateCard;
use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class ActivateCardHandler
 * @package LevelFiveTeam\Railsbank\CommandHandler\Card
 */
class ActivateCardHandler extends Handler
{
    /**
     * @param ActivateCard $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
     */
    public function handleActivateCard(ActivateCard $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST', true);
        return $beneficiary;
    }
}
