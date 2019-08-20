<?php

namespace Test;

use Railsbank\Exception\InvalidConfigException;
use Railsbank\Exception\RailsbankConfigurationMissingValueException;
use Railsbank\Railsbank;
use PHPUnit\Framework\TestCase;

class RailsbankTest extends TestCase
{
    public function testEmptyConfigThrowsError()
    {
        self::expectException(InvalidConfigException::class);
        self::expectExceptionMessage('Configuration not valid, refer to documentation.');
        new Railsbank();
    }

    public function testInvalidConfigurationThrowsError()
    {
        self::expectException(InvalidConfigException::class);
        self::expectExceptionMessage('Configuration not valid, refer to documentation.');
        new Railsbank(__DIR__ . '/configtest/emptyconfig.php', 'testtttt');
    }

    public function testInvalidMode()
    {
        self::expectException(RailsbankConfigurationMissingValueException::class);
        self::expectExceptionMessage('Railsbank configuration value missing for play.base_url, refer to documentation.');
        new Railsbank(__DIR__ . '/configtest/emptyarrayconfig.php', 'testtt');
    }
}
