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
        $railsbank = new Railsbank();
    }

    public function testInvalidConfigurationThrowsError()
    {
        self::expectException(InvalidConfigException::class);
        self::expectExceptionMessage('Configuration not valid, refer to documentation.');
        $railsbank = new Railsbank(__DIR__ . '/configtest/emptyconfig.php', 'testtttt');
    }
}
