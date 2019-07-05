<?php

namespace LevelFiveTeam\Railsbank;

interface CommandInterface
{
    public function getInputFilterSpecification() : array;

    public function setRailsbankConfig($railsbankConfig);

    public function getRailsbankConfig() : RailsbankConfig;

    public function getBody();
}
