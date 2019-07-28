<?php

namespace Railsbank\Exception;

class InvalidConfigException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Configuration not valid, refer to documentation.', 500);
    }
}
