<?php

namespace Railsbank\QueryHandler\Transaction;

use Railsbank\Handler;
use Railsbank\Query\Transaction\GetTransaction;
use Railsbank\RailsbankClient;

/**
 * Class GetTransactionHandler
 * @package Railsbank\Customer\GetQueryHandler
 */
class GetTransactionHandler extends Handler
{
    /**
     * @param GetTransaction $command
     * @return \Railsbank\Entity\Transaction\Transaction
     * @throws \Exception
     */
    public function handleGetTransaction(GetTransaction $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \Railsbank\Entity\Transaction\Transaction $version */
            $version = $client->handleApiCall($command, 'GET');
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
