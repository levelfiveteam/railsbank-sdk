<?php
namespace Railsbank\Query\Beneficiary;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Query\QueryInterface;

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
