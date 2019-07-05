<?php
namespace LevelFiveTeam\Railsbank\Entity\Card;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class Pin
 */
class Pin extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $pin;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->pin = $response->offsetGet('pin');

        parent::__construct($response);
    }

    public function getPin(): string
    {
        return $this->pin;
    }
}
