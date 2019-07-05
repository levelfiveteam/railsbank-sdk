<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Customer;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Query\Customer\GetLedgers;

/**
 * Class GetLedgersHandler
 * @package LevelFiveTeam\Railsbank\Customer\GetQueryHandler
 */
class GetLedgersHandler extends Handler
{
    /**
     * @param GetLedgers $command
     * @return string|null
     */
    public function handleGetLedgers(GetLedgers $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \LevelFiveTeam\Railsbank\Entity\Customer\GetLedgers $version */
            $version = $client->handleApiCall($command, 'GET', true);
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
