<?php
require_once '../vendor/autoload.php';

use Railsbank\Command\Customer\EndUsers\CreatePerson;
use Railsbank\Railsbank;

// Store Railsbank in a DI
try {
    $railsbank = new Railsbank('demo.config.php', 'play');
} catch (\Exception $e) {
    var_dump($e->getCode(), $e->getMessage());
    die();
}

// In controller or service, Run command (in memory - GetVersion) using my config (which should be stored in a DI Container)
// Really that simple :)
$command = new CreatePerson(
    [
        'name' => 'Amy Holbourne',
        'date_of_birth' => '1994-02-02',
        'telephone' => '07380565065',
        'nationality' => 'British',
        'country_of_residence' => 'GB',
        'date_onboarded' => (new \DateTime('now'))->format('d-m-Y'),
        'address' => [ 'address_refinement' => '4 Bedford House, 76 Darnley Road, Gravesend, DA11 0AX' ],
        'social_security_number' => '',
    ]
);

$person = $railsbank->handle($command);
var_dump($person);
