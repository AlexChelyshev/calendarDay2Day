<?php

namespace App\Controller;

use App\Entity\Day;
use App\Entity\Month;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    /**
     * @Route("/", name="calendar")
     */
    public function index()
    {
        $month = date('F');
        $number = cal_days_in_month(CAL_GREGORIAN, date("n"), date("Y"));
        $monthList = $this->createCalendar();
        $day = date("D", strtotime("06/07/2020"));
        return $this->render('calendar/index.html.twig', [
            'controller_name' => 'CalendarController',
            'month' => $month,
            'countOfDays' => $number,
            'monthList' => $monthList,
            'day' => $day,
        ]);
    }
    protected function createCalendar(){
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

                $month[$monthArr[$i]] = new Month($monthArr[$i], $days, false);
            }else{
                $month[$monthArr[$i]] = new Month($monthArr[$i], $days, true);
            }
        }
        return $month;
    }

}
