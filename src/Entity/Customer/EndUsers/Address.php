<?php
namespace Railsbank\Entity\Customer\EndUsers;

use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;
use Railsbank\Helper\ArrayResponse;

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

    public function getAddressCity(): ?string
    {
        return $this->addressCity;
    }

    public function getAddressIsoCountry(): ?string
    {
        return $this->addressIsoCountry;
    }

    public function getAddressNumber(): ?string
    {
        return $this->addressNumber;
    }

    public function getAddressPostalCode(): ?string
    {
        return $this->addressPostalCode;
    }

    public function getAddressRefinement(): ?string
    {
        return $this->addressRefinement;
    }

    public function getAddressRegion(): ?string
    {
        return $this->addressRegion;
    }

    public function getAddressStreet(): ?string
    {
        return $this->addressStreet;
    }
}
