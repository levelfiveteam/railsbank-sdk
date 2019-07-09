<?php

namespace Railsbank\QueryHandler\Customer;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Query\Customer\GetLedgers;

/**
 * Class GetLedgersHandler
 * @package Railsbank\Customer\GetQueryHandler
 */
class GetLedgersHandler extends Handler
{
    /**
     * @param GetLedgers $command
     * @return string|null
     */
    public function handleGetLedgers(GetLedgers $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \Railsbank\Entity\Customer\GetLedgers $version */
            $version = $client->handleApiCall($command, 'GET', true);
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
