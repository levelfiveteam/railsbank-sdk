<?php
namespace Railsbank\Entity\Version;

use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;
use Railsbank\Helper\ArrayResponse;

/**
 * Class VersionNumber
 * @package Railsbank\Entity\Version
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
        parent::__construct($response);

        $response = new ArrayResponse($response);
        $this->version = $response->offsetGet('version');
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
