<?php

namespace Railsbank;

use Railsbank\Exception\InvalidConfigException;

/**
 * This is the service that will simplify the commands (and act as a controller)
 *
 * Class Railsbank
 * @package Railsbank
 */
class Railsbank
{
    /**
     * @var CommandBusFactory
     */
    private $commandBus;

    /**
     * @var RailsbankConfig
     */
    private $railsbankConfig;

    /**
     * Railsbank constructor.
     *
     * @param string $configFile
     * @param string $mode
     *
     * @throws Exception\RailsbankConfigurationMissingException
     * @throws Exception\RailsbankConfigurationMissingValueException
     * @throws Exception\UnspecifiedModeException
     * @throws InvalidConfigException
     */
    public function __construct(string $configFile = '', string $mode = 'play')
    {
        $configuration = $this->getConfiguration($configFile);
        $this->railsbankConfig = new RailsbankConfig($configuration, $mode);
        $this->commandBus = new CommandBusFactory($this->railsbankConfig);
    }

    /**
     * @param string $configFile
     *
     * @return array|mixed
     * @throws InvalidConfigException
     */
    private function getConfiguration(string $configFile)
    {
        if (empty($configFile)) {
            throw new InvalidConfigException();
        }

        $config = require_once($configFile);

        if ( !is_array($config)) {
            throw new InvalidConfigException();
        }

        return $config;
    }

    /**
     * @param CommandInterface $command
     *
     * @return mixed
     */
    public function handle(CommandInterface $command)
    {
        return $this->commandBus->handle(
            $command->setRailsbankConfig($this->railsbankConfig)
        );
    }
}
