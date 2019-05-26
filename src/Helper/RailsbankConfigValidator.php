<?php

namespace LevelFiveTeam\Railsbank\Helper;

use LevelFiveTeam\Railsbank\Exception\RailsbankConfigurationMissingValueException;
use Zend\Config\Config;
use LevelFiveTeam\Railsbank\Exception\UnspecifiedModeException;
use LevelFiveTeam\Railsbank\Exception\RailsbankConfigurationMissingException;

class RailsbankConfigValidator
{
    /**
     * @var array
     */
    private $modes = [
        'play',
        'play_live',
        'live_account'
    ];

    private $railsbankApiParameters = [
        'base_url',
        'role',
        'api_key'
    ];

    public function validateConfig(Config $config)
    {
        try {
            $this->validateModes($config);
        } catch (\Exception $e) {
            throw new RailsbankConfigurationMissingException('mode');
        }

        foreach ($this->modes as $mode) {
            $this->validateRailsbankParameters($config, $mode);
        }

        return true;
    }

    private function validateRailsbankParameters(Config $config, string $mode)
    {
        /** @var Config $config */
        $config = $config->get($mode);

        foreach ($this->railsbankApiParameters as $parameter) {
            if (! $config->offsetExists($parameter)) {
                throw new RailsbankConfigurationMissingException($mode . '.' . $parameter);
            }

            if (empty($config->get($parameter))) {
                throw new RailsbankConfigurationMissingValueException($mode . '.' . $parameter);
            }
        }
    }

    private function validateModes(Config $config)
    {
        foreach ($this->modes as $mode) {
            if (! $config->offsetExists($mode)) {
                throw new UnspecifiedModeException();
            }
        }
    }
}
