<?php

namespace LevelFiveTeam\Railsbank\Entity;

/**
 * Class VersionNumber
 * @package LevelFiveTeam\Railsbank\Entity
 */
class VersionNumber extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $version;

    /**
     * VersionNumber constructor.
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->version = $response['version'];
        parent::__construct($response);
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
