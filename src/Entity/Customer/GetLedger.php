<?php
namespace Railsbank\Entity\Customer;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class GetLedger
 * @package Railsbank\Entity\Customer\GetLedger
 */
class GetLedger extends Entity implements EntityInterface
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $assetClass;

    /**
     * @var string
     */
    private $assetType;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $holderId;

    /**
     * @var string
     */
    private $lastModifiedAt;

    /**
     * @var string
     */
    private $iban;

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
    private $bicSwift;

    /**
     * @var string
     */
    private $currentBalance;

    /**
     * @var string
     */
    private $status;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->iban = $response->offsetGet('iban');
        $this->sortCode = $response->offsetGet('uk_sort_code');
        $this->bicSwift = $response->offsetGet('bic_swift');
        $this->accountNumber = $response->offsetGet('uk_account_number');
        $this->currentBalance = $response->offsetGet('amount');
        $this->status = $response->offsetGet('ledger_status');
        $this->amount = $response->offsetGet('amount');
        $this->assetClass = $response->offsetGet('asset_class');
        $this->assetType = $response->offsetGet('asset_type');
        $this->createdAt = $response->offsetGet('created_at');
        $this->holderId = $response->offsetGet('holder_id');
        $this->lastModifiedAt = $response->offsetGet('last_modified_at');

        parent::__construct($response);
    }

    public function getIban():? string
    {
        return $this->iban;
    }

    public function getSortCode():? string
    {
        return $this->sortCode;
    }

    public function getAccountNumber():? string
    {
        return $this->accountNumber;
    }

    public function getBicSwift():? string
    {
        return $this->bicSwift;
    }

    public function getCurrentBalance():? string
    {
        return $this->currentBalance;
    }

    public function getStatus():? string
    {
        return $this->status;
    }

    public function isLedgerStatusOk(): bool
    {
        return ($this->status === 'ledger-status-ok');
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getAssetClass(): string
    {
        return $this->assetClass;
    }

    public function getAssetType(): string
    {
        return $this->assetType;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getHolderId(): string
    {
        return $this->holderId;
    }

    public function getLastModifiedAt(): string
    {
        return $this->lastModifiedAt;
    }
}
