<?php

namespace App\Controller;

use App\Service\CreateCalendarService;
use App\Service\ParseInfoAboutDayService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    /**
     * @Route("/", name="calendar")
     * @param CreateCalendarService $createCalendarService
     * @param ParseInfoAboutDayService $infoAboutDayService
     * @return Response
     */
    public function index(CreateCalendarService $createCalendarService, ParseInfoAboutDayService $infoAboutDayService)
    {
        $forRender['monthList'] = $createCalendarService->createCalendar();
        $forRender['infoAboutDay'] = $infoAboutDayService->parseInfoAboutDay();

        return $this->render('calendar/index.html.twig', $forRender);
    }
}
