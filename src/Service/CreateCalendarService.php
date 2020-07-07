<?php


namespace App\Service;


use App\Entity\Day;
use App\Entity\Month;

class CreateCalendarService
{
    /**
     * @return array
     */
    public function createCalendar(): array {
        $calendar = array();
        $monthArr = [
            "month",
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        for ($i = 1; $i <= 12; $i++){
            $number = cal_days_in_month(CAL_GREGORIAN, $i, date("Y"));
            $days = array();
            for ($h = 1; $h <= $number; $h++){
                if($h !=  date("j") || $i !=  date("n")){
                    $days[$h] = new Day(
                        $h,
                        date("D", strtotime(date("m")."/$h/".$i)),
                        false);
                }else{
                    $days[$h] = new Day(
                        $h,
                        date("D", strtotime(date("m")."/$h/".date("Y"))),
                        true);
                }

            }
            if($i !=  date("n")){

                $calendar[$monthArr[$i]] = new Month($monthArr[$i], $days, false);
            }else{
                $calendar[$monthArr[$i]] = new Month($monthArr[$i], $days, true);
            }
        }
        return $calendar;
    }
}