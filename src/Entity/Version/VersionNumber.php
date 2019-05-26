<?php
namespace LevelFiveTeam\Railsbank\Entity\Version;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;

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
        $response = new ArrayResponse($response);
        $this->version = $response->offsetGet('version');
        
        parent::__construct($response);
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
