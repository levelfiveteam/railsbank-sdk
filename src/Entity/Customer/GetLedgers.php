<?php
namespace Railsbank\Entity\Customer;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class GetLedgers
 * @package Railsbank\Entity\Customer\GetLedgers
 */
class GetLedgers extends Entity implements EntityInterface
{
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

        parent::__construct($response);
    }

    /**
     * @return string
     */
    public function getIban():? string
    {
        return $this->iban;
    }

    /**
     * @return string
     */
    public function getSortCode():? string
    {
        return $this->sortCode;
    }

    /**
     * @return string
     */
    public function getAccountNumber():? string
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getBicSwift():? string
    {
        return $this->bicSwift;
    }

    /**
     * @return string
     */
    public function getCurrentBalance():? string
    {
        return $this->currentBalance;
    }

    /**
     * @return string
     */
    public function getStatus():? string
    {
        return $this->status;
    }

    public function isLedgerStatusOk(): bool
    {
        return ($this->status === 'ledger-status-ok');
    }
}
