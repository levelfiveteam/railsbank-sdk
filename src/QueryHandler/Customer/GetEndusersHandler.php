<?php

namespace Railsbank\QueryHandler\Customer;

use Railsbank\Handler;
use Railsbank\Query\Customer\GetEndusers;
use Railsbank\RailsbankClient;

/**
 * Class GetEndusersHandler
 * @package Railsbank\Customer\GetQueryHandler
 */
class GetEndusersHandler extends Handler
{
    /**
     * @param GetEndusers $command
     * @return \Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetEndusers(GetEndusers $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            $version = $client->handleApiCall($command, 'GET', true);
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
