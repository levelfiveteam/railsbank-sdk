<?php
namespace LevelFiveTeam\Railsbank\Entity\Customer\EndUsers;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;

/**
 * Class EndUser
 * @package LevelFiveTeam\Railsbank\Entity\Customer\EndUsers
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
     * @var array|null
     */
    private $ledgers;

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
        $this->person = new Person($response->offsetGet('person'));
        $this->ledgers = $response->offsetGet('ledgers');

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

    /**
     * @return array
     */
    public function getLedgers():? array
    {
        return $this->ledgers;
    }

    /**
     * @return Person
     */
    public function getPerson():? Person
    {
        return $this->person;
    }

    /**
     * @return bool
     */
    public function isScreenMonitoredSearch():? bool
    {
        return $this->screenMonitoredSearch;
    }
}