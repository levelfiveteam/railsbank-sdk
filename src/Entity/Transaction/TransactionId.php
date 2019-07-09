<?php
namespace Railsbank\Entity\Transaction;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class TransactionId
 * @package Railsbank\Entity\Transaction
 */
class TransactionId extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $transactionId;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->transactionId = $response->offsetGet('transaction_id');

        parent::__construct($response);
    }

    public function getTransactionId(): string
    {
        return $this->transactionId;
    }
}
