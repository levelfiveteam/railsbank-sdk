<?php
namespace LevelFiveTeam\Railsbank\Entity\Version;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class VersionNumber
 * @package LevelFiveTeam\Railsbank\Entity\Version
 */
class VersionNumber extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $version;

    /**
     * VersionNumber constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $this->version = $response->version;
        parent::__construct($response);
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
