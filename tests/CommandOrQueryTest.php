<?php

namespace Test;

use DomainException;
use Railsbank\CommandInterface;
use PHPUnit\Framework\TestCase;
use Railsbank\Command;

abstract class CommandOrQueryTest extends TestCase implements CommandOrQueryTestInterface
{
    /**
     * @dataProvider getCommandInputs
     */
    public function testCommand($errorExpected = false, $input = [], $response = false)
    {
        if ($errorExpected) {
            self::expectException(DomainException::class);
            self::expectExceptionCode(422);
        }

        if (empty($this->command)) {
            throw new \InvalidArgumentException('Command does not exist');
        }

        /** @var CommandInterface $command */
        $command = new $this->command($input);

        self::assertInstanceOf(Command::class, $command);

        if ($response) {
            self::assertEquals($command->getBody(), $response);
        }
    }
}
