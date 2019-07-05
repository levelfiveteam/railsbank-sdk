<?php
namespace LevelFiveTeam\Railsbank\Entity\Transaction;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class Transactions
 * @package LevelFiveTeam\Railsbank\Entity\Transaction
 */
class Transactions extends Entity implements EntityInterface
{
    /**
     * @var []|null
     */
    private $transactions;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        foreach ($response as &$transaction) {
            $transaction = new Transaction($transaction);
        }

        $this->transactions = $response;

        parent::__construct($response);
    }

    public function getTransactions():? array
    {
        return $this->transactions;
    }
}
