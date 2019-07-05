<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Transaction;

use LevelFiveTeam\Railsbank\Entity\Transaction\DetailedTransaction;
use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Transaction\GetTransaction;
use LevelFiveTeam\Railsbank\Query\Transaction\GetTransactions;
use LevelFiveTeam\Railsbank\Entity\Transaction\Transactions;
use LevelFiveTeam\Railsbank\Entity\Transaction\Transaction;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetTransactionsHandler
 * @package LevelFiveTeam\Railsbank\Customer\GetQueryHandler
 */
class GetTransactionsHandler extends Handler
{
    /**
     * @param GetTransactions $command
     * @return \LevelFiveTeam\Railsbank\Entity\Transaction\Transactions
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
