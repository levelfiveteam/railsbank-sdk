<?php
namespace LevelFiveTeam\Railsbank\Entity\Beneficiary;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class BeneficiaryId
 * @package LevelFiveTeam\Railsbank\Entity\Beneficiary\Beneficiary
 */
class BeneficiaryId extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $beneficiaryId;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->beneficiaryId = $response->offsetGet('beneficiary_id');

        parent::__construct($response);
    }

    public function getBeneficiaryId(): string
    {
        return $this->beneficiaryId;
    }
}
