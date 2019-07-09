<?php
namespace Railsbank\Entity\Customer;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class Ledger
 * @package Railsbank\Entity\Customer\Ledger
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
