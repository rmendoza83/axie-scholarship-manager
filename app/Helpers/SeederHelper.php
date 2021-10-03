<?php

namespace App\Helpers;

use DateTime;
use DateInterval;
use DatePeriod;

class SeederHelper
{
    public static function getDateRange(DateTime $fromDate, DateTime $toDate)
    {
        $interval = DateInterval::createFromDateString('1 day');
        $datesRange = new DatePeriod($fromDate, $interval, $toDate);
        return $datesRange;
    }
}
