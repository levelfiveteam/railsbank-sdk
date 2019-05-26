<?php

namespace LevelFiveTeam\Railsbank;

use GuzzleHttp\Client;
use Zend\Config\Config;

class HandleApiCall
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Config
     */
    private $config;

    public function __construct()
    {
        $this->client = new Client();
        $this->config = new ConfigService();
    }

    private function getApiBaseUrl()
    {
        $railsbankConfiguratiion = $this->config->get('railsbank_configuration.mode.');
        $mode = $this->getMode();

        return $railsbankConfiguratiion[$mode]['base_url'];
    }

    private function getMode()
    {
        return $this->config->get('mode');
    }
}
