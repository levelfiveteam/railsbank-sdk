<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Zend\Config\Config;
use Zend\Config\Factory;

class ConfigTest extends TestCase
{
    public function testConfig()
    {
        $config = Factory::fromFile(__DIR__ . '/../config/railsbank.config.php');
        $configService = new Config($config);
        self::assertEquals('Level 5 - Railsbank PHP SDK', $configService->get('application_name'));
    }
}
