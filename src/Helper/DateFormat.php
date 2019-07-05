<?php
namespace LevelFiveTeam\Railsbank\Helper;

/**
 * Centralise date formatting for Railsbank API
 *
 * Class DateFormat
 * @package LevelFiveTeam\Railsbank\Helper
 */
class DateFormat
{
    public function getCurrentDate() : string
    {
        $date = new \DateTime('now');
        return $date->format('Y-m-d');
    }
}
