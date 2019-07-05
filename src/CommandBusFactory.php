<?php

namespace LevelFiveTeam\Railsbank;

use League\Container\Container;
use League\Tactician\CommandBus;
use League\Container\ReflectionContainer;
use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameInflector;

/**
 * Class CommandBusFactory
 * @package LevelFiveTeam\Railsbank
 */
class CommandBusFactory
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * CommandBusFactory constructor.
     *
     * @param RailsbankConfig $railsbankConfig
     */
    public function __construct(RailsbankConfig $railsbankConfig)
    {
        $this->registerCommandBus($railsbankConfig);
    }

    /**
     * @param CommandInterface $command
     *
     * @return mixed
     */
    public function handle(CommandInterface $command)
    {
        return $this->commandBus->handle($command);
    }

    /**
     * @param RailsbankConfig $railsbankConfig
     */
    private function registerCommandBus(RailsbankConfig $railsbankConfig)
    {
        $commands = $railsbankConfig->getBaseConfig()->get('commands');

        $containerLocator = new ContainerLocator(
            (new Container())->delegate(new ReflectionContainer()),
            $commands->toArray()
        );

        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            $containerLocator,
            new HandleClassNameInflector()
        );

        $this->commandBus = new CommandBus([$handlerMiddleware]);
    }
}
