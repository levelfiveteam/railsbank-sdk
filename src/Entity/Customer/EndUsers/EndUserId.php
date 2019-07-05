<?php
namespace LevelFiveTeam\Railsbank\Entity\Customer\EndUsers;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;

/**
 * Class EndUserId
 * @package LevelFiveTeam\Railsbank\Entity\Customer\EndUsers
 */
class EndUserId extends Entity implements EntityInterface
{
    /**
     * @var string
     */
    private $endUserId;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->endUserId = $response->offsetGet('enduser_id');

        parent::__construct($response);
    }

    public function getEndUserId(): string
    {
        return $this->endUserId;
    }
}
