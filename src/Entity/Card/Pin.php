<?php
namespace Railsbank\Entity\Card;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

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
