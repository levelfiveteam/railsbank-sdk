<?php

namespace LevelFiveTeam\Railsbank\CommandHandler\Beneficiary;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Command\Beneficiary\CreateBeneficiary;

/**
 * Class CreateBeneficiaryHandler
 * @package LevelFiveTeam\Railsbank\CommandHandler\BeneficiaryHandler
 */
class CreateBeneficiaryHandler extends Handler
{
    /**
     * @param CreateBeneficiary $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateBeneficiary(CreateBeneficiary $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST');
        return $beneficiary;
    }
}
