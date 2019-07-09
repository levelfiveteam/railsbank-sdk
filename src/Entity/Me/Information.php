<?php
namespace Railsbank\Entity\Me;

use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;
use Railsbank\Helper\ArrayResponse;

/**
 * Class VersionNumber
 * @package Railsbank\Entity\Me\Information
 */
class Information extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $metaCustomerId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $accessLevel;

    /**
     * @var string
     */
    private $companyName;

    /**
     * VersionNumber constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->id = $response->offsetGet('customer_id');
        $this->metaCustomerId = $response->offsetGet('metacustomer_id');
        $this->status = $response->offsetGet('customer_status');
        $this->accessLevel = $response->offsetGet('customer_access_level');

        $company = new ArrayResponse($response->offsetGet('company'));
        $this->companyName = $company->offsetGet('name');

        parent::__construct($response);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMetaCustomerId(): string
    {
        return $this->metaCustomerId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getAccessLevel(): string
    {
        return $this->accessLevel;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }
}
