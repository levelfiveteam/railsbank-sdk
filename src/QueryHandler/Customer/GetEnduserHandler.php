<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Customer;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Customer\GetEnduser;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetEnduserHandler
 * @package LevelFiveTeam\Railsbank\Customer\GetQueryHandler
 */
class GetEnduserHandler extends Handler
{
    /**
     * @param GetEnduser $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetEnduser(GetEnduser $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            $version = $client->handleApiCall($command, 'GET');
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
