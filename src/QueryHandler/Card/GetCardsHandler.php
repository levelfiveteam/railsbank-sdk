<?php

namespace Railsbank\QueryHandler\Card;

use Railsbank\Handler;
use Railsbank\Query\Card\GetCards;
use Railsbank\RailsbankClient;

/**
 * Class GetCardsHandler
 * @package Railsbank\Card\GetCardsHandler
 */
class GetCardsHandler extends Handler
{
    /**
     * @param GetCards $command
     * @return \Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetCards(GetCards $command)
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
