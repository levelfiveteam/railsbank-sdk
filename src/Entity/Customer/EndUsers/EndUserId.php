<?php
namespace Railsbank\Entity\Customer\EndUsers;

use Railsbank\Entity\Entity;
use Railsbank\Entity\EntityInterface;
use Railsbank\Helper\ArrayResponse;

/**
 * Class EndUserId
 * @package Railsbank\Entity\Customer\EndUsers
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
