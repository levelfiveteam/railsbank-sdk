<?php
namespace LevelFiveTeam\Railsbank\Entity\Customer\EndUsers;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;

/**
 * Class Person
 * @package LevelFiveTeam\Railsbank\Entity\Customer\EndUsers
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
     * @param mixed $response
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

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    /**
     * @return string|null
     */
    public function getDateOnboarded(): ?string
    {
        return $this->dateOnboarded;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getSocialSecurityNumber(): ?string
    {
        return $this->socialSecurityNumber;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
}
