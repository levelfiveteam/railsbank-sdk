<?php
namespace LevelFiveTeam\Railsbank\Entity\Card;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class CardId
 * @package LevelFiveTeam\Railsbank\Entity\Transaction
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
