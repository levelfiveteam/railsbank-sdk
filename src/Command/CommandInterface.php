<?php

namespace LevelFiveTeam\Railsbank;

interface CommandInterface
{
    public function getInputFilterSpecification() : array;
}
