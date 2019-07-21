<?php
namespace Railsbank\Entity\Beneficiary;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class Beneficiary
 * @package Railsbank\Entity\Beneficiary\Beneficiary
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

    public function getIban(): string
    {
        return $this->iban;
    }

    public function getBicSwift(): string
    {
        return $this->bicSwift;
    }

    public function getLastModifiedAt(): string
    {
        return $this->lastModifiedAt;
    }

    public function getBeneficiaryStatus(): string
    {
        return $this->beneficiaryStatus;
    }

    public function getSortCode(): string
    {
        return $this->sortCode;
    }

    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    public function getBankName():? string
    {
        return $this->bankName;
    }
    public function getPersonName():? string
    {
        return $this->personName;
    }

    public function getBeneficiaryId() :? string
    {
        return $this->beneificiaryId;
    }
}
