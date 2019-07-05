<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Transaction;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Transaction\GetTransaction;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetTransactionHandler
 * @package LevelFiveTeam\Railsbank\Customer\GetQueryHandler
 */
class GetTransactionHandler extends Handler
{
    /**
     * @param GetTransaction $command
     * @return \LevelFiveTeam\Railsbank\Entity\Transaction\Transaction
     * @throws \Exception
     */
    public function handleGetTransaction(GetTransaction $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \LevelFiveTeam\Railsbank\Entity\Transaction\Transaction $version */
            $version = $client->handleApiCall($command, 'GET');
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
