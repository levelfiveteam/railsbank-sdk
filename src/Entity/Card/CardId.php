<?php
namespace Railsbank\Entity\Card;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class CardId
 * @package Railsbank\Entity\Transaction
 */
class CardId extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $cardId;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->cardId = $response->offsetGet('card_id');

        parent::__construct($response);
    }

    public function getCardId(): string
    {
        return $this->cardId;
    }
}
