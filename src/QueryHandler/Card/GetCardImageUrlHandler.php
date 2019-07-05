<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Card;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Card\GetCardImageUrl;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetCardImageUrlHandler
 * @package LevelFiveTeam\Railsbank\Card\GetCardsHandler
 */
class GetCardImageUrlHandler extends Handler
{
    /**
     * @param GetCardImageUrl $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetCardImageUrl(GetCardImageUrl $command)
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
