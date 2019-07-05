<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Card;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Query\Card\GetPin;

/**
 * Class GetPinHandler
 */
class GetPinHandler extends Handler
{
    /**
     * @param GetPin $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetPin(GetPin $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            $pin = $client->handleApiCall($command, 'GET');
            return $pin;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
