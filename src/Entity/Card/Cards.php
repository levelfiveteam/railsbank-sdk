<?php
namespace Railsbank\Entity\Card;

use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;

/**
 * Class Cards
 * @package Railsbank\Entity\Cards
 */
class Cards extends Entity implements EntityInterface
{
    /**
     * @var []|null
     */
    private $cards;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        foreach ($response as &$card) {
            $card = new Card($card);
        }

        $this->cards = $response;

        parent::__construct($response);
    }

    public function getCards():? array
    {
        return $this->cards;
    }

    public function removeCard(Card $cardToRemove) : self
    {
        /** @var Card $card*/
        foreach ($this->cards as $key => $card) {
            if ($card->getCardId() === $cardToRemove->getCardId()) {
                unset($this->cards[$key]);
            }
        }

        return $this;
    }

    public function getByLedgerId(string $ledgerId) : self
    {
        $cards = $this->getCards();

        /** @var Card $card */
        foreach ($cards as $card) {
            if ($card->getLedgerId() !== $ledgerId) {
                $this->removeCard($card);
            }
        }

        return $this;
    }
}
