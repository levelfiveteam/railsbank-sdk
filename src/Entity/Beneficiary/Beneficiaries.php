<?php
namespace LevelFiveTeam\Railsbank\Entity\Beneficiary;

use LevelFiveTeam\Railsbank\Entity\Card\Card;
use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class Beneficiaries
 * @package LevelFiveTeam\Railsbank\Entity\Beneficiary
 */
class Beneficiaries extends Entity implements EntityInterface
{
    /**
     * @var []|null
     */
    private $beneficiaries;

    /**
     * Beneficiaries constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        foreach ($response as &$beneficiary) {
            $beneficiary = new Beneficiary($beneficiary);
        }

        $this->beneficiaries = $response;

        parent::__construct($response);
    }

    public function getBeneficiaries():? array
    {
        return $this->beneficiaries;
    }
}
