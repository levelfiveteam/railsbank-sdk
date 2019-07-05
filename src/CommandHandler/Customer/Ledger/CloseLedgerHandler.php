<?php

namespace LevelFiveTeam\Railsbank\CommandHandler\Customer\Ledger;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Command\Customer\Ledger\CloseLedger;

/**
 * Class CloseLedgerHandler
 * @package LevelFiveTeam\Railsbank\CommandHandler\Customer\Ledger
 */
class CloseLedgerHandler extends Handler
{
    /**
     * @param CloseLedger $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
     */
    public function handleLedgers(CloseLedger $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $ledger = $client->handleApiCall($command, 'POST');
        return $ledger;
    }
}
