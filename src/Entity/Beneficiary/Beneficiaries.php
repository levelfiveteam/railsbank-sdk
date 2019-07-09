<?php
namespace Railsbank\Entity\Beneficiary;

use Railsbank\Entity\Card\Card;
use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;

/**
 * Class Beneficiaries
 * @package Railsbank\Entity\Beneficiary
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
