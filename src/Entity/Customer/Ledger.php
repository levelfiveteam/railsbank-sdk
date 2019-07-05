<?php
namespace LevelFiveTeam\Railsbank\Entity\Customer;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class Ledger
 * @package LevelFiveTeam\Railsbank\Entity\Customer\Ledger
 */
class Ledger extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $ledgerId;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->ledgerId = $response->offsetGet('ledger_id');

        parent::__construct($response);
    }

    public function getLedgerId(): string
    {
        return $this->ledgerId;
    }
}
