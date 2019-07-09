<?php

namespace Railsbank\QueryHandler\Customer;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Query\Customer\GetLedger;

/**
 * Class GetLedgerHandler
 * @package Railsbank\Customer\GetQueryHandler
 */
class GetLedgerHandler extends Handler
{
    /**
     * @param GetLedger $command
     * @return string|null
     */
    public function handleGetLedger(GetLedger $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \Railsbank\Entity\Customer\GetLedger $version */
            $version = $client->handleApiCall($command);
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
