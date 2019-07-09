<?php

namespace Railsbank\QueryHandler\Version;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Query\Version\GetVersion;

/**
 * Class GetVersionHandler
 * @package Railsbank\QueryHandler\Version
 */
class GetVersionHandler extends Handler
{
    /**
     * @param GetVersion $command
     * @return \Railsbank\Entity\EntityInterface|null
     */
    public function handleGetVersion(GetVersion $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            $version = $client->handleApiCall($command);
        } catch (\Exception $e) {
            // handle exceptions
        }

        return $version;
    }
}
