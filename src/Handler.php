<?php

namespace LevelFiveTeam\Railsbank;

/**
 * Class Handler
 * @package LevelFiveTeam\Railsbank
 */
abstract class Handler
{
    /**
     * @var RailsbankConfig
     */
    protected $railsbankConfig;

    /**
     * @param RailsbankConfig $railsbankConfig
     * @return $this
     */
    public function setRailsbankConfig(RailsbankConfig $railsbankConfig)
    {
        $this->railsbankConfig = $railsbankConfig;
        return $this;
    }
}
