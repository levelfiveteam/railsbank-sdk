<?php

namespace Railsbank\CommandHandler\Beneficiary;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Command\Beneficiary\CreateBeneficiary;

/**
 * Class CreateBeneficiaryHandler
 * @package Railsbank\CommandHandler\BeneficiaryHandler
 */
class CreateBeneficiaryHandler extends Handler
{
    /**
     * @param CreateBeneficiary $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleCreateBeneficiary(CreateBeneficiary $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());
        $beneficiary = $client->handleApiCall($command, 'POST');
        return $beneficiary;
    }
}
