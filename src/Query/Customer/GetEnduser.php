<?php
namespace LevelFiveTeam\Railsbank\Query\Customer;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class GetEnduser extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [
            'enduser_id' => [ 'required' => true, ],
        ];
    }

    public function getBody(): ?array
    {
        return [
            'enduser_id' => $this->input->get('enduser_id')->getValue(),
        ];
    }
}
