<?php
use LevelFiveTeam\Railsbank\Command;
use LevelFiveTeam\Railsbank\CommandHandler;

/**
 * Configuration for Railsbank API
 * All the URLs and Specified keys must be stored in environment variables
*/
return [
    'application_name' => 'Railsbank PHP SDK',
    'mode' => (getenv('RAILSBANK_MODE'))?: 'play',
    'railsbank_configuration' => [
        'play' => [
            'base_url' => getenv('RAILSBANK_PLAY_BASEURL'),
            'role' => getenv('RAILSBANK_PLAY_ROLE'),
            'api_key' => getenv('RAILSBANK_API_KEY'),
        ],
        'play_live' => [
            'base_url' => getenv('RAILSBANK_PLAYLIVE_BASEURL'),
            'role' => getenv('RAILSBANK_PLAYLIVE_ROLE'),
            'api_key' => getenv('RAILSBANK_PLAYLIVE_API_KEY'),
        ],
        'live_account' => [
            'base_url' => getenv('RAILSBANK_LIVE_BASEURL'),
            'role' => getenv('RAILSBANK_LIVE_ROLE'),
            'api_key' => getenv('RAILSBANK_LIVE_API_KEY'),
        ],
    ],
    'api_calls' => [
        'version' => [
            'customer/version'
        ],
    ],
    'commands' => [
        Command\Version\GetVersion::class => CommandHandler\Version\GetVersionCommandHandler::class,
    ],
    'validators' => [

    ],
    'middleware' => [

    ],
];
