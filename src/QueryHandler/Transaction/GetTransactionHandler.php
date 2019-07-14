<?php

namespace Railsbank\QueryHandler\Transaction;

use Railsbank\Handler;
use Railsbank\Query\Transaction\GetTransaction;
use Railsbank\RailsbankClient;

/**
 * Class GetTransactionHandler
 */
class GetTransactionHandler extends Handler
{
    /**
     * @return \Railsbank\Entity\Transaction\Transaction
     * @throws \Exception
     */
    public function handleGetTransaction(GetTransaction $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \Railsbank\Entity\Transaction\Transaction $transaction */
            $transaction = $client->handleApiCall($command, 'GET');
            return $transaction;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
