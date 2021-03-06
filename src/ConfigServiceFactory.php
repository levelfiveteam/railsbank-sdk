<?php

namespace Railsbank;

use Railsbank\Exception\RailsbankConfigurationMissingException;
use Zend\Config\Config;
use Zend\Config\Factory;
use Railsbank\Helper\RailsbankConfigValidator;

/**
 * Class ConfigServiceFactory
 * @package Railsbank
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
     * @return Config|null
     *
     * @throws Exception\RailsbankConfigurationMissingValueException
     * @throws RailsbankConfigurationMissingException
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
     *
     * @return bool|null
     *
     * @throws Exception\RailsbankConfigurationMissingValueException
     * @throws RailsbankConfigurationMissingException
     */
    private function validateConfig(Config $config) :? bool
    {
        $railsbankConfigValidator = new RailsbankConfigValidator();
        $railsbankConfig = $this->getRailsbankConfiguration($config);
        return $railsbankConfigValidator->validateConfig($railsbankConfig);
    }

    /**
     * @param Config $config
     * @return Config
     *
     * @throws RailsbankConfigurationMissingException
     */
    private function getRailsbankConfiguration(Config $config) :? Config
    {
        if (! $config->offsetExists('railsbank_configuration')) {
            throw new RailsbankConfigurationMissingException();
        }

        return $config->offsetGet('railsbank_configuration');
    }
}
