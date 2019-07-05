<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Version;

use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\RailsbankClient;
use LevelFiveTeam\Railsbank\Query\Version\GetVersion;

/**
 * Class GetVersionHandler
 * @package LevelFiveTeam\Railsbank\QueryHandler\Version
 */
class GetVersionHandler extends Handler
{
    /**
     * @param GetVersion $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|null
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
