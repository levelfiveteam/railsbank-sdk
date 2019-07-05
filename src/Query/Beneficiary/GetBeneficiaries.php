<?php
namespace LevelFiveTeam\Railsbank\Query\Beneficiary;

use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandInterface;
use LevelFiveTeam\Railsbank\Query\QueryInterface;

class GetBeneficiaries extends Command implements CommandInterface, QueryInterface
{
    public function getInputFilterSpecification() : array
    {
        return [
            'holder_id' => [ 'required' => true ],
        ];
    }

    public function getBody(): ?array
    {
        return [
            'holder_id' => $this->input->get('holder_id')->getValue(),
        ];
    }
}
