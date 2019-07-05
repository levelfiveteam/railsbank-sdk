<?php
namespace LevelFiveTeam\Railsbank\Entity\Transaction;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class TransactionId
 * @package LevelFiveTeam\Railsbank\Entity\Transaction
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
