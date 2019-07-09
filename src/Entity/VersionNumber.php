<?php
namespace Railsbank\Entity;

/**
 * Class VersionNumber
 * @package Railsbank\Entity
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
