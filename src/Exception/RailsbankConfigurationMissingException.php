<?php

namespace Railsbank\Exception;

use Throwable;

class RailsbankConfigurationMissingException extends \Exception
{
    public function __construct($key = "")
    {
        $message = 'Railsbank configuration missing, refer to documentation.';

        if ($key !== '') {
            $message .= '  Key and/or value missing=' . $key;
        }

        parent::__construct($message, 500);
    }
}
