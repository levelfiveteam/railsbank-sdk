<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Customer;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Customer\GetEndusers;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetEndusersHandler
 * @package LevelFiveTeam\Railsbank\Customer\GetQueryHandler
 */
class GetEndusersHandler extends Handler
{
    /**
     * @param GetEndusers $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetEndusers(GetEndusers $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            $version = $client->handleApiCall($command, 'GET', true);
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
