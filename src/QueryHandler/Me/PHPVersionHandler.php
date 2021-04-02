<?php

namespace Railsbank\QueryHandler\Me;

use Railsbank\Handler;
use Railsbank\Query\Me\PHPVersion;
use Railsbank\RailsbankClient;
use Railsbank\Query\Me\Information;

/**
 * Class PHPVersionHandler
 * @package Railsbank\QueryHandler\Me
 */
class PHPVersionHandler extends Handler
{
    /**
     * @param PHPVersion $command
     * @return string|null
     */
    public function handlePHPVersion(PHPVersion $command)
    {
        return \phpversion();
    }
}
