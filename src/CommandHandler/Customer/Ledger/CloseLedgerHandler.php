<?php

namespace Railsbank\CommandHandler\Customer\Ledger;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Command\Customer\Ledger\CloseLedger;

/**
 * Class CloseLedgerHandler
 */
class CloseLedgerHandler extends Handler
{
    /**
     * @param CloseLedger $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleCloseLedger(CloseLedger $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $ledger = $client->handleApiCall($command, 'POST');
        return $ledger;
    }
}
