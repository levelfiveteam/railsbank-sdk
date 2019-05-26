<?php
use LevelFiveTeam\Railsbank\Query;

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
        //
    ],
    'entity_map' => [
        Query\Version\GetVersion::class => "LevelFiveTeam\\Railsbank\\Entity\\Version\\VersionNumber",
        Query\Me\Information::class => "LevelFiveTeam\\Railsbank\\Entity\\Me\\Information",
    ],
    'railsbank_http_url' => [
        Query\Version\GetVersion::class => '/v1/customer/version',
        Query\Me\Information::class => '/v1/customer/me',
    ],
];
