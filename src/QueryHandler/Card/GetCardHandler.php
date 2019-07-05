<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Card;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Card\GetCard;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetCardsHandler
 * @package LevelFiveTeam\Railsbank\Card\GetCardsHandler
 */
class GetCardHandler extends Handler
{
    /**
     * @param GetCard $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|string|null
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
