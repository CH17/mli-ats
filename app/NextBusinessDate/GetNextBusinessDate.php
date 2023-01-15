<?php

namespace App\NextBusinessDate;

use DateInterval;
use DateTime;

class GetNextBusinessDate
{
    public function addBusinessDays($start_date, $days)
    {

        $business_date = new DateTime();
        $business_date->setTimestamp($start_date);
        while ($days > 0) {
            $weekDay = $business_date->format('N');

            // Skip Saturday and Sunday
            if ($weekDay == 6 || $weekDay == 7) {
                $business_date = $business_date->add(new DateInterval('P1D'));
                continue;
            }

            $days--;
            $next_business_date = $business_date->add(new DateInterval('P1D'));
        }

        $next_business_date = date("Y-m-d", $business_date->getTimestamp());

        return $next_business_date;
    }

    public function dueBusinessDate ($start_date, $days) {
        
        $date = new DateTime($start_date);
        $date->modify('-'.$days.' weekday');
        return $date->format('Y-m-d');
    }
}
