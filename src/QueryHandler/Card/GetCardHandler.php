<?php

namespace Railsbank\QueryHandler\Card;

use Railsbank\Handler;
use Railsbank\Query\Card\GetCard;
use Railsbank\RailsbankClient;

/**
 * Class GetCardsHandler
 * @package Railsbank\Card\GetCardsHandler
 */
class GetCardHandler extends Handler
{
    /**
     * @param GetCard $command
     * @return \Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetCard(GetCard $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            $cards = $client->handleApiCall($command, 'GET');
            return $cards;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
