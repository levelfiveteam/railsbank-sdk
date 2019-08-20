<?php

namespace Railsbank\Exception;

class RailsbankConfigurationMissingException extends \Exception
{
    public function __construct($key = "")
    {
        $message = 'Railsbank configuration missing, refer to documentation.';

        if ($key !== '') {
            $message .= '  Key and/or value missing=' . $key . ' or all mode configuration are missing';
        }

        parent::__construct($message, 500);
    }
}
