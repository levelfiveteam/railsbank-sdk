<?php

namespace LevelFiveTeam\Railsbank\CommandHandler\Customer\Ledger;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Command\Customer\Ledger\CreateLedger;

/**
 * Class CreateLedgerHandler
 * @package LevelFiveTeam\Railsbank\CommandHandler\Customer\Ledger
 */
class CreateLedgerHandler extends Handler
{
    /**
     * @param CreateLedger $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateLedger(CreateLedger $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $person = $client->handleApiCall($command, 'POST');
        return $person;
    }
}
