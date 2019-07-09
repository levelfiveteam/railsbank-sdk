<?php

namespace Railsbank\QueryHandler\Me;

use Railsbank\Handler;
use Railsbank\RailsbankClient;
use Railsbank\Query\Me\Information;

/**
 * Class InformationHandler
 * @package Railsbank\QueryHandler\Me
 */
class InformationHandler extends Handler
{
    /**
     * @param Information $command
     * @return string|null
     */
    public function handleInformation(Information $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var \Railsbank\Entity\Me\Information $version */
            $version = $client->handleApiCall($command);
            return $version;
        } catch (\Exception $e) {
            // handle exceptions
        }

    }
}
