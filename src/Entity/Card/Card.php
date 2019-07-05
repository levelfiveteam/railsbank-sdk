<?php
namespace LevelFiveTeam\Railsbank\Entity\Card;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class Card
 * @package LevelFiveTeam\Railsbank\Entity\Card
 */
class Card extends Entity implements EntityInterface
{
    /**
     * @var string|null
     */
    private $ledgerId;

    /**
     * @var string|null
     */
    private $cardToken;

    /**
     * @var string|null
     */
    private $cardId;

    /**
     * @var string|null
     */
    private $cardType;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $partnerProduct;

    /**
     * @var string|null
     */
    private $cardDesign;

    /**
     * @var string|null
     */
    private $cardStatus;

    /**
     * @var string|null
     */
    private $cardProgramme;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->ledgerId = $response->offsetGet('ledger_id');
        $this->cardToken = $response->offsetGet('card_token');
        $this->cardId = $response->offsetGet('card_id');
        $this->cardType = $response->offsetGet('card_type');
        $this->createdAt = $response->offsetGet('created_at');
        $this->partnerProduct = $response->offsetGet('partner_product');
        $this->cardDesign = $response->offsetGet('card_design');
        $this->cardStatus = $response->offsetGet('card_status');
        $this->cardProgramme = $response->offsetGet('card_programme');

        parent::__construct($response);
    }

    /**
     * @return string|null
     */
    public function getLedgerId(): ?string
    {
        return $this->ledgerId;
    }

    /**
     * @return string|null
     */
    public function getCardToken(): ?string
    {
        return $this->cardToken;
    }

    /**
     * @return string|null
     */
    public function getCardId(): ?string
    {
        return $this->cardId;
    }

    /**
     * @return string|null
     */
    public function getCardType(): ?string
    {
        return $this->cardType;
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
    public function getPartnerProduct(): ?string
    {
        return $this->partnerProduct;
    }

    /**
     * @return string|null
     */
    public function getCardDesign(): ?string
    {
        return $this->cardDesign;
    }

    /**
     * @return string|null
     */
    public function getCardStatus(): ?string
    {
        return $this->cardStatus;
    }

    /**
     * @return string|null
     */
    public function getCardProgramme(): ?string
    {
        return $this->cardProgramme;
    }

    public function isActive() : bool
    {
        return ($this->cardStatus === 'card-status-active');
    }

    public function isAwaitingActivation() : bool
    {
        return ($this->cardStatus === 'card-status-awaiting-activation');
    }
}
