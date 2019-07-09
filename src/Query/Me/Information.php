<?php
namespace Railsbank\Query\Me;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

class Information extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }

    public function getBody() :? array
    {
        //
    }
}
