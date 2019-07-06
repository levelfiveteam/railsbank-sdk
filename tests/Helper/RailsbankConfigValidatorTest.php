<?php
namespace Test\Helper;

use LevelFiveTeam\Railsbank\Exception\RailsbankConfigurationMissingException;
use LevelFiveTeam\Railsbank\Exception\RailsbankConfigurationMissingValueException;
use LevelFiveTeam\Railsbank\Helper\RailsbankConfigValidator;
use PHPUnit\Framework\TestCase;
use Zend\Config\Config;

class RailsbankConfigValidatorTest extends TestCase
{
    public function testEmptyConfigThrowsException()
    {
        self::expectException(RailsbankConfigurationMissingException::class);
        self::expectExceptionMessage('Railsbank configuration missing, refer to documentation.  Key and/or value missing=mode');
        self::expectExceptionCode(500);

        $config = new Config([]);
        $railsbankConfigValidator = new RailsbankConfigValidator();
        self::assertTrue($railsbankConfigValidator->validateConfig($config));
    }

    public function testNoPlayModeThrowsException()
    {
        self::expectException(RailsbankConfigurationMissingException::class);
        self::expectExceptionMessage('Railsbank configuration missing, refer to documentation.  Key and/or value missing=mode');
        self::expectExceptionCode(500);

        $config = new Config(['play_live' => [], 'live_account' => []]);
        $railsbankConfigValidator = new RailsbankConfigValidator();
        self::assertTrue($railsbankConfigValidator->validateConfig($config));
    }

    public function testNoBaseUrlParameterExistsThrowsException()
    {
        self::expectException(RailsbankConfigurationMissingException::class);
        self::expectExceptionMessage('Railsbank configuration missing, refer to documentation.  Key and/or value missing=play.base_url');
        self::expectExceptionCode(500);

        $config = new Config(
            [
                'play' => [],
                'play_live' => [],
                'live_account' => []
            ]
        );

        $railsbankConfigValidator = new RailsbankConfigValidator();
        self::assertTrue($railsbankConfigValidator->validateConfig($config));
    }

    public function testNoRoleParameterExistsThrowsException()
    {
        self::expectException(RailsbankConfigurationMissingException::class);
        self::expectExceptionMessage('Railsbank configuration missing, refer to documentation.  Key and/or value missing=play.role');
        self::expectExceptionCode(500);

        $config = new Config(
            [
                'play' => [
                    'base_url' => 'test',
                ],
                'play_live' => [],
                'live_account' => []
            ]
        );

        $railsbankConfigValidator = new RailsbankConfigValidator();
        self::assertTrue($railsbankConfigValidator->validateConfig($config));
    }

    public function testNoApiKeyParameterExistsThrowsException()
    {
        self::expectException(RailsbankConfigurationMissingException::class);
        self::expectExceptionMessage('Railsbank configuration missing, refer to documentation.  Key and/or value missing=play.api_key');
        self::expectExceptionCode(500);

        $config = new Config(
            [
                'play' => [
                    'base_url' => 'test',
                    'role' => 'test',
                ],
                'play_live' => [],
                'live_account' => []
            ]
        );

        $railsbankConfigValidator = new RailsbankConfigValidator();
        self::assertTrue($railsbankConfigValidator->validateConfig($config));
    }

    public function testAllParametersButEmptyThrowsException()
    {
        self::expectException(RailsbankConfigurationMissingValueException::class);
        self::expectExceptionMessage('Railsbank configuration value missing for play.base_url, refer to documentation.');
        self::expectExceptionCode(500);

        $config = new Config(
            [
                'play' => [
                    'base_url' => '',
                    'role' => '',
                    'api_key' => '',
                ],
                'play_live' => [
                    'base_url' => '',
                    'role' => '',
                    'api_key' => '',
                ],
                'live_account' => [
                    'base_url' => '',
                    'role' => '',
                    'api_key' => '',
                ]
            ]
        );

        $railsbankConfigValidator = new RailsbankConfigValidator();
        self::assertTrue($railsbankConfigValidator->validateConfig($config));
    }

    public function testValidConfigReturnsNoException()
    {
        $config = new Config(
            [
                'play' => [
                    'base_url' => 'test',
                    'role' => 'test',
                    'api_key' => 'test',
                ],
                'play_live' => [
                    'base_url' => 'test',
                    'role' => 'test',
                    'api_key' => 'test',
                ],
                'live_account' => [
                    'base_url' => 'test',
                    'role' => 'test',
                    'api_key' => 'test',
                ]
            ]
        );

        $railsbankConfigValidator = new RailsbankConfigValidator();
        self::assertTrue($railsbankConfigValidator->validateConfig($config));
    }
}
