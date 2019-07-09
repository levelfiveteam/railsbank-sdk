<?php

namespace Railsbank\CommandHandler\Transaction;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Command\Transaction\CreateTransaction;

/**
 * Class CreateTransactionHandler
 * @package Railsbank\CommandHandler\BeneficiaryHandler
 */
class CreateTransactionHandler extends Handler
{
    /**
     * @param CreateTransaction $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateTransaction(CreateTransaction $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST');
        return $beneficiary;
    }
}
