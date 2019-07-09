<?php

namespace Railsbank\Exception;

class RailsbankConfigurationMissingValueException extends \Exception
{
    public function __construct($key = "")
    {
        $message = 'Railsbank configuration value missing for ' . $key . ', refer to documentation.';
        parent::__construct($message, 500);
    }
}
