<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Beneficiary;

use LevelFiveTeam\Railsbank\Entity\Beneficiary\Beneficiary;
use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Beneficiary\GetBeneficiaries;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetBeneficiariesHandler
 * @package LevelFiveTeam\Railsbank\QueryHandler\Beneficiary
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
