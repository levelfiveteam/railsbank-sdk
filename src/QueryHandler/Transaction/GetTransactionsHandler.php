<?php

namespace Railsbank\QueryHandler\Transaction;

use Railsbank\Entity\Transaction\DetailedTransaction;
use Railsbank\Handler;
use Railsbank\Query\Transaction\GetTransaction;
use Railsbank\Query\Transaction\GetTransactions;
use Railsbank\Entity\Transaction\Transactions;
use Railsbank\Entity\Transaction\Transaction;
use Railsbank\RailsbankClient;

/**
 * Class GetTransactionsHandler
 * @package Railsbank\Customer\GetQueryHandler
 */
class GetTransactionsHandler extends Handler
{
    /**
     * @param GetTransactions $command
     * @return \Railsbank\Entity\Transaction\Transactions
     * @throws \Exception
     */
    public function handleGetTransactions(GetTransactions $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var Transactions $transactions */
            $transactions = $client->handleApiCall($command, 'GET');

            /** @var Transaction $transaction */
            foreach ($transactions->getTransactions() as $transaction) {

                /** @var DetailedTransaction $detailedTransaction */
                $detailedTransaction = $client->handleApiCall(
                    new GetTransaction(['transaction_id' => $transaction->getTransactionId()])
                );

                $transaction->setDetailedTransaction($detailedTransaction);
            }

            return $transactions;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
