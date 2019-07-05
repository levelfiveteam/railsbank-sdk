<?php
namespace LevelFiveTeam\Railsbank\Entity\Transaction;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class Transaction
 * @package LevelFiveTeam\Railsbank\Entity\Transaction
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

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @return string|null
     */
    public function getLedgerEntryId(): ?string
    {
        return $this->ledgerEntryId;
    }

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
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
