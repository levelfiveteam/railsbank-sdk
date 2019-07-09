<?php
namespace Railsbank\Query\Customer;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

class GetEndusers extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }

    public function getBody(): ?array
    {
        return [];
    }
}
