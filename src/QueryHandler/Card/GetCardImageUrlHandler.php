<?php

namespace Railsbank\QueryHandler\Card;

use Railsbank\Handler;
use Railsbank\Query\Card\GetCardImageUrl;
use Railsbank\RailsbankClient;

/**
 * Class GetCardImageUrlHandler
 * @package Railsbank\Card\GetCardsHandler
 */
class GetCardImageUrlHandler extends Handler
{
    /**
     * @param GetCardImageUrl $command
     * @return \Railsbank\Entity\EntityInterface|string|null
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
