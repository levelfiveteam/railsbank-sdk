<?php

namespace Railsbank\CommandHandler\Card;

use Railsbank\Command\Card\ActivateCard;
use Railsbank\Handler;
use Railsbank\RailsbankClient;

/**
 * Class ActivateCardHandler
 * @package Railsbank\CommandHandler\Card
 */
class ActivateCardHandler extends Handler
{
    /**
     * @param ActivateCard $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleActivateCard(ActivateCard $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST', true);
        return $beneficiary;
    }
}
