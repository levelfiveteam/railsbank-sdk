<?php

namespace Railsbank\QueryHandler\Card;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Query\Card\GetPin;

/**
 * Class GetPinHandler
 */
class GetPinHandler extends Handler
{
    /**
     * @param GetPin $command
     * @return \Railsbank\Entity\EntityInterface|string|null
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
