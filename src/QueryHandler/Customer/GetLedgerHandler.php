<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Customer;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Query\Customer\GetLedger;

/**
 * Class GetLedgerHandler
 * @package LevelFiveTeam\Railsbank\Customer\GetQueryHandler
 */
class GetLedgerHandler extends Handler
{
    /**
     * @param GetLedger $command
     * @return string|null
     */
    public function handleGetLedger(GetLedger $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \LevelFiveTeam\Railsbank\Entity\Customer\GetLedger $version */
            $version = $client->handleApiCall($command);
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
