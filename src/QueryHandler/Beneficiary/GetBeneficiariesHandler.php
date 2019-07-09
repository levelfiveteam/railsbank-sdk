<?php

namespace Railsbank\QueryHandler\Beneficiary;

use Railsbank\Entity\Beneficiary\Beneficiary;
use Railsbank\Handler;
use Railsbank\Query\Beneficiary\GetBeneficiaries;
use Railsbank\RailsbankClient;

/**
 * Class GetBeneficiariesHandler
 * @package Railsbank\QueryHandler\Beneficiary
 */
class GetBeneficiariesHandler extends Handler
{
    /**
     * @param Beneficiary $command
     * @return string|null
     */
    public function handleGetBeneficiaries(GetBeneficiaries $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        $beneficiaries = $client->handleApiCall($command);
        return $beneficiaries;
    }
}
