<?php

namespace LevelFiveTeam\Railsbank\CommandHandler\Transaction;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Command\Transaction\CreateTransaction;

/**
 * Class CreateTransactionHandler
 * @package LevelFiveTeam\Railsbank\CommandHandler\BeneficiaryHandler
 */
class CreateTransactionHandler extends Handler
{
    /**
     * @param CreateTransaction $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateTransaction(CreateTransaction $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST');
        return $beneficiary;
    }
}
