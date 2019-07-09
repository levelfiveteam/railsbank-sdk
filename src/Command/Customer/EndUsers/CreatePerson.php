<?php

namespace Railsbank\Command\Customer\EndUsers;

use Railsbank\Command;
use Railsbank\CommandInterface;
use Railsbank\Helper\DateFormat;

class CreatePerson extends Command implements CommandInterface
{
    public function getBody(): array
    {
        return [
            'person' => [
                'address' => [
                    'address_city' => $this->input->get('address_city')->getValue(),
                    'address_iso_country' => $this->input->get('address_iso_country')->getValue(),
                    'address_number' => $this->input->get('address_number')->getValue(),
                    'address_postal_code' => $this->input->get('address_postal_code')->getValue(),
                    'address_refinement' => $this->input->get('address_refinement')->getValue(),
                    'address_region' => $this->input->get('address_region')->getValue(),
                    'address_street' => $this->input->get('address_street')->getValue(),
                ],
                'country_of_residence' => [ $this->input->get('country_of_residence')->getValue() ],
                'date_onboarded' => (new DateFormat())->getCurrentDate(),
                'date_of_birth' => $this->input->get('date_of_birth')->getValue(),
                'email' => $this->input->get('email')->getValue(),
                'name' => $this->input->get('name')->getValue(),
                'social_security_number' => $this->input->get('social_security_number')->getValue(),
                'telephone' => $this->input->get('telephone')->getValue(),
            ],
            'enduser_meta' => $this->input->get('enduser_meta')->getValue(),
        ];
    }

    public function getInputFilterSpecification(): array
    {
        return [
            'address_city' => ['required' => false,],
            'address_iso_country' => ['required' => false,],
            'address_number' => ['required' => false,],
            'address_postal_code' => ['required' => false,],
            'address_refinement' => ['required' => false,],
            'address_region' => ['required' => false,],
            'address_street' => ['required' => false,],
            'name' => ['required' => true,],
            'email' => ['required' => false,],
            'date_of_birth' => ['required' => false,],
            'telephone' => ['required' => false,],
            'address' => ['required' => false,],
            'nationality' => ['required' => false,],
            'country_of_residence' => ['required' => false,],
            'enduser_meta' => ['required' => false],
            'social_security_number' => ['required' => false],
        ];
    }
}
