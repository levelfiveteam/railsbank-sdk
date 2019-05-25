<?php

namespace LevelFiveTeam\Railsbank;

use Zend\Config\Config;
use Zend\Config\Factory;

/**
 * Class ConfigService
 * @package LevelFiveTeam\Railsbank
 */
class ConfigService
{
    /**
     * ConfigService constructor.
     */
    public function __construct()
    {
        $config = Factory::fromFile(__DIR__ . '/../config/railsbank.config.php');
        return new Config($config);
    }
}
