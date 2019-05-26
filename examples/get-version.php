<?php
require_once '../vendor/autoload.php';

use LevelFiveTeam\Railsbank\Command\Version\GetVersion;
use LevelFiveTeam\Railsbank\Railsbank;

$command = new GetVersion();

$config = [
    'play' => [
        'base_url' => 'https://play.railsbank.com',
        'role' => 'customer-admin',
        'api_key' => '2qlni9jxgc1s6c7slzf7o2nln0lij3s7#2kn6b6bllm2fyip5g5v21bvk0nrxrsoornexz8d3614h31r3vhwqn7h5yl88ppwl',
    ],
    'play_live' => [
        'base_url' => 'https://play.railsbank.com',
        'role' => 'customer-admin',
        'api_key' => '2qlni9jxgc1s6c7slzf7o2nln0lij3s7#2kn6b6bllm2fyip5g5v21bvk0nrxrsoornexz8d3614h31r3vhwqn7h5yl88ppwl',
    ],
    'live_account' => [
        'base_url' => 'https://play.railsbank.com',
        'role' => 'customer-admin',
        'api_key' => '2qlni9jxgc1s6c7slzf7o2nln0lij3s7#2kn6b6bllm2fyip5g5v21bvk0nrxrsoornexz8d3614h31r3vhwqn7h5yl88ppwl',
    ],
];

try {
    $railsbank = new Railsbank($config, 'play');
    $response= $railsbank->runQuery($command);
} catch (\Exception $e) {
    var_dump($e);
}

var_dump($response, 'script complete');
