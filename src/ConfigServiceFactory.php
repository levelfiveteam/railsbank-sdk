<?php

namespace LevelFiveTeam\Railsbank;

use LevelFiveTeam\Railsbank\Exception\RailsbankConfigurationMissingException;
use Zend\Config\Config;
use Zend\Config\Factory;
use LevelFiveTeam\Railsbank\Helper\RailsbankConfigValidator;

/**
 * Class ConfigServiceFactory
 * @package LevelFiveTeam\Railsbank
 */
class ConfigServiceFactory
{
    /**
     * @var array
     */
    private $config = [];

    /**
     * ConfigServiceFactory constructor.
     *
     * @param bool $config
     */
    public function __construct($config = false)
    {
        if (! empty($config)) {
            $configuration = [
                'railsbank_configuration' => $config,
            ];

            $this->config = $configuration;
        }
    }

    /**
     * @throws Exception\RailsbankConfigurationMissingException
     */
    public function getConfigService() :? Config
    {
        $config = Factory::fromFile(__DIR__ . '/../config/railsbank.config.php');

        if (! empty($this->config)) {
            $config = array_merge($config, $this->config);
        }

        $config = new Config($config);
        $this->validateConfig($config);

        return $config;
    }

    /**
     * @param Config $config
     * @return bool
     *
     * @throws Exception\RailsbankConfigurationMissingException
     */
    private function validateConfig(Config $config) :? bool
    {
        $railsbankConfigValidator = new RailsbankConfigValidator();
        return $railsbankConfigValidator->validateConfig(
            $this->getRailsbankConfiguration($config)
        );
    }

    /**
     * @param Config $config
     * @return bool
     *
     * @throws RailsbankConfigurationMissingException
     */
    private function getRailsbankConfiguration(Config $config) :? bool
    {
        if (! $config = $config->offsetGet('railsbank_configuration')) {
            throw new RailsbankConfigurationMissingException();
        }

        return $config;
    }
}
