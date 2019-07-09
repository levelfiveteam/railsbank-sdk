<?php

namespace Railsbank;

/**
 * Class Handler
 * @package Railsbank
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
