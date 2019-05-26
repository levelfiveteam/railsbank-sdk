<?php
namespace LevelFiveTeam\Railsbank\CommandHandler;

interface CommandHandlerInterface
{
    /**
     * @return mixed
     */
    public function handle();
}
