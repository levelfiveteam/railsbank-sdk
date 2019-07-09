<?php

namespace Railsbank\QueryHandler\Customer;

use Railsbank\Handler;
use Railsbank\Query\Customer\GetEnduser;
use Railsbank\RailsbankClient;

/**
 * Class GetEnduserHandler
 * @package Railsbank\Customer\GetQueryHandler
 */
class GetEnduserHandler extends Handler
{
    /**
     * @param GetEnduser $command
     * @return \Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetEnduser(GetEnduser $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            $version = $client->handleApiCall($command, 'GET');
            return $version;
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
