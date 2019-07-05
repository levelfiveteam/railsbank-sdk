<?php
namespace LevelFiveTeam\Railsbank\Entity\Beneficiary;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class Beneficiary
 * @package LevelFiveTeam\Railsbank\Entity\Beneficiary\Beneficiary
 */
class Beneficiary extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $beneificiaryId;

    /**
     * @var string
     */
    private $iban;

    /**
     * @var string
     */
    private $bicSwift;

    /**
     * @var string
     */
    private $lastModifiedAt;

    /**
     * @var string
     */
    private $beneficiaryStatus;

    /**
     * @var string
     */
    private $sortCode;

    /**
     * @var string
     */
    private $accountNumber;

    /**
     * @var string
     */
    private $bankName;

    /**
     * @var string
     */
    private $personName;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->beneificiaryId = $response->offsetGet('beneficiary_id');
        $this->iban = $response->offsetGet('iban');
        $this->bicSwift = $response->offsetGet('bic_swift');
        $this->lastModifiedAt = $response->offsetGet('last_modified_at');
        $this->beneficiaryStatus = $response->offsetGet('beneficiary_status');
        $this->sortCode = $response->offsetGet('uk_sort_code');
        $this->accountNumber = $response->offsetGet('uk_account_number');
        $this->bankName = $response->offsetGet('bank_name');

        $person = new ArrayResponse($response->offsetGet('person'));

        $this->personName = $person->offsetGet('name');

        parent::__construct($response);
    }

    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @return string
     */
    public function getBicSwift(): string
    {
        return $this->bicSwift;
    }

    /**
     * @return string
     */
    public function getLastModifiedAt(): string
    {
        return $this->lastModifiedAt;
    }

    /**
     * @return string
     */
    public function getBeneficiaryStatus(): string
    {
        return $this->beneficiaryStatus;
    }

    /**
     * @return string
     */
    public function getSortCode(): string
    {
        return $this->sortCode;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getBankName():? string
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function getPersonName():? string
    {
        return $this->personName;
    }

    public function getBeneficiaryId() :? string
    {
        return $this->beneificiaryId;
    }
}
