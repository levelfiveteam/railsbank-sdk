<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Me;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Query\Me\Information;

/**
 * Class InformationHandler
 * @package LevelFiveTeam\Railsbank\QueryHandler\Me
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
            /** @var \LevelFiveTeam\Railsbank\Entity\Me\Information $version */
            $version = $client->handleApiCall($command);
            return $version;
        } catch (\Exception $e) {
            // handle exceptions
        }

    }
}
