<?php
namespace Railsbank\Query\Card;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

class GetCards extends Command implements CommandInterface, QueryInterface
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
