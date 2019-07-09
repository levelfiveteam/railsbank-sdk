<?php
namespace Railsbank\Helper;

/**
 * Centralise date formatting for Railsbank API
 *
 * Class DateFormat
 * @package Railsbank\Helper
 */
class DateFormat
{
    public function getCurrentDate() : string
    {
        $date = new \DateTime('now');
        return $date->format('Y-m-d');
    }
}
