<?php
namespace Railsbank\Query\Version;

use Railsbank\Command;
use Railsbank\CommandInterface;

class GetVersion extends Command implements CommandInterface
{
    public function getInputFilterSpecification() : array
    {
        return [];
    }

    public function getBody()
    {
        //
    }
}
