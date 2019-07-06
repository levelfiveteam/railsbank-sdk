<?php
namespace Test\Helper;

use LevelFiveTeam\Railsbank\Helper\DateFormat;
use PHPUnit\Framework\TestCase;

class DateFormatTest extends TestCase
{
    public function testArrayExists()
    {
        $currentDate = (new \DateTime())->format('Y-m-d');
        self::assertEquals((new DateFormat())->getCurrentDate(), $currentDate);
    }

}
