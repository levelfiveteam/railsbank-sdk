<?php
namespace LevelFiveTeam\Railsbank\Entity\Customer\EndUsers;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;

/**
 * Class Address
 * @package LevelFiveTeam\Railsbank\Entity\Customer\EndUsers
 */
class Address extends Entity implements EntityInterface
{
    /**
     * @var string|null
     */
    private $addressCity;

    /**
     * @var string|null
     */
    private $addressIsoCountry;

    /**
     * @var string|null
     */
    private $addressNumber;

    /**
     * @var string|null
     */
    private $addressPostalCode;

    /**
     * @var string|null
     */
    private $addressRefinement;

    /**
     * @var string|null
     */
    private $addressRegion;

    /**
     * @var string|null
     */
    private $addressStreet;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->endUserId = $response->offsetGet('addressCity');
        $this->endUserId = $response->offsetGet('addressIsoCountry');
        $this->endUserId = $response->offsetGet('addressNumber');
        $this->endUserId = $response->offsetGet('addressPostalCode');
        $this->endUserId = $response->offsetGet('addressRefinement');
        $this->endUserId = $response->offsetGet('addressRegion');
        $this->endUserId = $response->offsetGet('addressStreet');

        parent::__construct($response);
    }

    /**
     * @return string|null
     */
    public function getAddressCity(): ?string
    {
        return $this->addressCity;
    }

    /**
     * @return string|null
     */
    public function getAddressIsoCountry(): ?string
    {
        return $this->addressIsoCountry;
    }

    /**
     * @return string|null
     */
    public function getAddressNumber(): ?string
    {
        return $this->addressNumber;
    }

    /**
     * @return string|null
     */
    public function getAddressPostalCode(): ?string
    {
        return $this->addressPostalCode;
    }

    /**
     * @return string|null
     */
    public function getAddressRefinement(): ?string
    {
        return $this->addressRefinement;
    }

    /**
     * @return string|null
     */
    public function getAddressRegion(): ?string
    {
        return $this->addressRegion;
    }

    /**
     * @return string|null
     */
    public function getAddressStreet(): ?string
    {
        return $this->addressStreet;
    }
}
