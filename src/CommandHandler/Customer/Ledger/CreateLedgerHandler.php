<?php

namespace Railsbank\CommandHandler\Customer\Ledger;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Command\Customer\Ledger\CreateLedger;

/**
 * Class CreateLedgerHandler
 * @package Railsbank\CommandHandler\Customer\Ledger
 */
class CreateLedgerHandler extends Handler
{
    /**
     * @param CreateLedger $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateLedger(CreateLedger $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $person = $client->handleApiCall($command, 'POST');
        return $person;
    }
}
