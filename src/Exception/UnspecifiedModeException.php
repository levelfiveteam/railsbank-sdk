<?php

namespace Railsbank\Exception;

class UnspecifiedModeException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Mode not specified, refer to documentation', 500);
    }
}
