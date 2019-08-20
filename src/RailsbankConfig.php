<?php

namespace Railsbank;

use Zend\Config\Config;
use Railsbank\Exception\UnspecifiedModeException;
use Railsbank\Exception\RailsbankConfigurationMissingException;

class RailsbankConfig
{
    /**
     * @var Config
     */
    private $configService;

    /**
     * @var Config
     */
    private $railsbankConfig;

    /**
     * @var string
     */
    private $mode;

    /**
     * RailsbankConfig constructor.
     *
     * @param array $config
     * @param string|null $mode
     *
     * @throws Exception\RailsbankConfigurationMissingValueException
     * @throws RailsbankConfigurationMissingException
     * @throws UnspecifiedModeException
     */
    public function __construct(array $config = [], string $mode = null)
    {
        if ( !empty($mode)) {
            $this->mode = $mode;
        }

        $mode = $this->getMode();

        $configServiceFactory = new ConfigServiceFactory($config);
        $this->configService = $configServiceFactory->getConfigService();

        /** @var Config $railsbankConfig */
        $railsbankConfig = $this->configService->get('railsbank_configuration');

        /** @var Config railsbankConfig */
        $this->railsbankConfig = $railsbankConfig->get($mode);
    }

    public function getBaseConfig() : Config
    {
        return $this->configService;
    }

    public function getBaseApiUrl() : string
    {
        return $this->railsbankConfig->get('base_url');
    }

    public function getApiKey() : string
    {
        return $this->railsbankConfig->get('api_key');
    }

    /**
     * @throws UnspecifiedModeException
     */
    public function getMode() :? string
    {
        $mode = (! empty($this->mode))? $this->mode : $this->configService->get('mode');

        if (empty($mode)) {
            throw new UnspecifiedModeException();
        }

        return $mode;
    }
}
