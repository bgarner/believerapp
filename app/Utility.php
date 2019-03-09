<?php

namespace App;

use Carbon\Carbon;

class Utility
{

    public static function prettifyDate($date)
    {
        if($date == '0000-00-00 00:00:00' || $date == NULL) {
            return "";
        }
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('D, M d, Y');
    }

    public static function prettifyDateWithTime($date)
    {
        if($date == '0000-00-00 00:00:00' || $date == NULL) {
            return "";
        }
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('D, M d, Y h:i a');;
    }

    public static function getTimePastSinceDate($date)
    {
        if($date == '0000-00-00 00:00:00' || $date == NULL) {
            return "";
        }
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        $since = Carbon::now()->diffForHumans($date, true);
        return $since;
    }

    public static function getMonthName($monthNumber)
    {
        return date("F", mktime(0, 0, 0, $monthNumber, 1));
    }

    public static function getDayName($monthNumber, $dayNumber)
    {
        return date("l", mktime(0, 0, 0, $monthNumber, $dayNumber));
    }

}
