<?php

namespace App\EventSubscriber;
use App\Entity\Expertise;
use App\Form\ExpertiseType;
use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class CalendarSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData',
        ];
    }


public function onCalendarSetData(CalendarEvent $calendar)
{
    $start = $calendar->getStart();
    $end = $calendar->getEnd();
    $filters = $calendar->getFilters();

    $expertises = $this->entityManager->getRepository(Expertise::class)->findAll();

    foreach ($expertises as $expertise) {
        $event = new Event(
            $expertise->getTitre(),
            $expertise->getDate(),
            $expertise->getDate()
        );

        $event->setOptions([
            'backgroundColor' => 'red',
            'borderColor' => 'red',
        ]);

        $calendar->addEvent($event);
    }
}


}