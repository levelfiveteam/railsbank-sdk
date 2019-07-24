<?php
namespace Railsbank\Entity\Customer\EndUsers;

use phpDocumentor\Reflection\Types\Mixed_;
use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;
use Railsbank\Helper\ArrayResponse;

/**
 * Class EndUser
 * @package Railsbank\Entity\Customer\EndUsers
 */
class EndUser extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $enduserId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $enduserStatus;

    /**
     * @var string|null
     */
    private $entityType;

    /**
     * @var string|null
     */
    private $lastModifiedAt;

    /**
     * @var mixed|null
     */
    private $metaData;

    /**
     * @var array|null
     */
    private $ledgers;

    /**
     * @var array|null
     */
    private $beneficiaries;

    /**
     * @var Person
     */
    private $person;

    /**
     * @var bool|null
     */
    private $screenMonitoredSearch;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->enduserId = $response->offsetGet('enduser_id');
        $this->createdAt = $response->offsetGet('created_at');
        $this->metaData = $response->offsetGet('enduser_meta');
        $this->enduserStatus = $response->offsetGet('enduser_status');
        $this->entityType = $response->offsetGet('entity_type');
        $this->lastModifiedAt = $response->offsetGet('last_modified_at');
        $this->screenMonitoredSearch = $response->offsetGet('screening_monitored_search');

        $this->person = new Person($response->offsetGet('person'));
        $this->ledgers = $response->offsetGet('ledgers');
        $this->beneficiaries = $response->offsetGet('beneficiaries');

        parent::__construct($response);
    }

    public function getEndUserId(): string
    {
        return $this->enduserId;
    }

    /**
     * @return string
     */
    public function getCreatedAt():? string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getEnduserStatus():? string
    {
        return $this->enduserStatus;
    }

    /**
     * @return string
     */
    public function getEntityType():? string
    {
        return $this->entityType;
    }

    /**
     * @return string
     */
    public function getLastModifiedAt():? string
    {
        return $this->lastModifiedAt;
    }

    public function getLedgers():? array
    {
        return $this->ledgers;
    }

    public function getPerson():? Person
    {
        return $this->person;
    }

    public function isScreenMonitoredSearch():? bool
    {
        return $this->screenMonitoredSearch;
    }

    public function getBeneficiaries():? array
    {
        return $this->beneficiaries;
    }

    /**
     * @return mixed|null
     */
    public function getMetaData()
    {
        return $this->metaData;
    }
}
