<?php

namespace LevelFiveTeam\Railsbank\Command;

interface CommandInterface
{
    public function getInputFilterSpecification() : array;
}
