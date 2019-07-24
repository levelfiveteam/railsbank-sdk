<?php
namespace Railsbank\Entity\Customer\EndUsers;

use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;
use Railsbank\Helper\ArrayResponse;

/**
 * Class Person
 * @package Railsbank\Entity\Customer\EndUsers
 */
class Person extends Entity implements EntityInterface
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @var string|null
     */
    private $dateOfBirth;

    /**
     * @var string|null
     */
    private $dateOnboarded;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $socialSecurityNumber;

    /**
     * @var string|null
     */
    private $telephone;

    /**
     * Person constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);

        $this->dateOfBirth = $response->offsetGet('date_of_birth');
        $this->dateOnboarded = $response->offsetGet('date_onboarded');
        $this->email = $response->offsetGet('email');
        $this->name = $response->offsetGet('name');
        $this->socialSecurityNumber = $response->offsetGet('social_security_number');
        $this->telephone = $response->offsetGet('telephone');

        $this->address = new Address($response->offsetGet('address'));

        parent::__construct($response);
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    public function getDateOnboarded(): ?string
    {
        return $this->dateOnboarded;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSocialSecurityNumber(): ?string
    {
        return $this->socialSecurityNumber;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
}
