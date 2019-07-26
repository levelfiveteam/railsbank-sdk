<?php
namespace Railsbank\Entity\Transaction;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class Transaction
 * @package Railsbank\Entity\Transaction
 */
class Transaction extends Entity implements EntityInterface
{
    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $ledgerEntryId;

    /**
     * @var string|null
     */
    private $transactionId;

    /**
     * @var string|null
     */
    private $amount;

    /**
     * @var string|null
     */
    private $ledgerEntryType;

    /**
     * @var DetailedTransaction
     */
    private $detailedTransaction;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->createdAt = $response->offsetGet('created_at');
        $this->ledgerEntryId = $response->offsetGet('ledger_entry_id');
        $this->transactionId = $response->offsetGet('transaction_id');
        $this->amount = $response->offsetGet('amount');
        $this->ledgerEntryType = $response->offsetGet('ledger_entry_type');

        parent::__construct($response);
    }

    public function getDetailedTransaction() :? DetailedTransaction
    {
        return $this->detailedTransaction;
    }

    public function setDetailedTransaction(DetailedTransaction $detailedTransaction) : self
    {
        $this->detailedTransaction = $detailedTransaction;
        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getLedgerEntryId(): ?string
    {
        return $this->ledgerEntryId;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function getLedgerEntryType(): ?string
    {
        return $this->ledgerEntryType;
    }

    public function isCredit() : bool
    {
        return $this->ledgerEntryType === 'credit';
    }

    public function isDebit() : bool
    {
        return $this->ledgerEntryType === 'debit';
    }
}
