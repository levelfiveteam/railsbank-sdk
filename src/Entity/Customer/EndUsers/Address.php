<?php
namespace Railsbank\Entity\Customer\EndUsers;

use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;
use Railsbank\Helper\ArrayResponse;

/**
 * Class Address
 * @package Railsbank\Entity\Customer\EndUsers
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
        $this->addressCity = $response->offsetGet('addressCity');
        $this->addressIsoCountry = $response->offsetGet('addressIsoCountry');
        $this->addressNumber = $response->offsetGet('addressNumber');
        $this->addressPostalCode = $response->offsetGet('addressPostalCode');
        $this->addressRefinement = $response->offsetGet('addressRefinement');
        $this->addressRegion = $response->offsetGet('addressRegion');
        $this->addressStreet = $response->offsetGet('addressStreet');

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
