<?php
namespace App\Services;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;

class BookingService
{
    private $serviceTimeIntervals;
    private $timeSlotIntervals;
    private $availableSlots;
    private $schedules;
    private $events;

    public function __construct($serviceTimeIntervals = 30,$timeSlotsIntervals = 30)
    {
        $this->timeSlotIntervals = CarbonInterval::minutes($timeSlotsIntervals);
        $this->serviceTimeIntervals = CarbonInterval::minutes($serviceTimeIntervals);
        $this->schedules = $this->getSchedule();
        $this->events = $this->getEvents();
    }

    public function getAvailableTimeSlots()
    {
        return collect($this->schedules)
                ->map(fn($schedule) => $this->getTimeSlotsForSchedule($schedule))
                ->flatten();
    }

    public function getTimeSlotsForSchedule($schedule)
    {

        $availableSlots = [];

        $timeSlots = CarbonPeriod::create($schedule['start'],$this->timeSlotIntervals,$schedule['end'])->excludeEndDate();

        foreach($timeSlots as $timeSlot)
        {
            $endTimeSlot = $timeSlot->copy()->add($this->serviceTimeIntervals); 
            if($this->checkSlotAvailibility($timeSlot,$endTimeSlot,$this->events)) // Check available time slots
            {
                if( !($endTimeSlot > Carbon::create($schedule['end']) ) ) // chceck service time requirement will go beyond time schedule
                {
                    $availableSlots[] = $timeSlot;
                }
            }
        }

        return $availableSlots;
    }

    private function checkSlotAvailibility($to,$from,$events)
    {
        foreach($events as $event)
        {
            $start = Carbon::create($event['start']);
            $end = Carbon::create($event['end']);
            if(CarbonPeriod::create($start,$end)->overlaps($to,$from)){
                    return false;
            }
        }
        return true;
    }

    private function getSchedule()
    {
        return [
            [
                'start' => '2022-01-18 09:00:00',
                'end' => '2022-01-18 17:00:00',
            ],
            [
                'start' => '2022-01-18 19:00:00',
                'end' => '2022-01-18 23:00:00',
            ]   
        ];
    }

    private function getEvents()
    {
        return [
            [
                'title' => 'Fernando - Haircut',
                'start' => '2022-01-18 09:30:00',
                'end' => '2022-01-18 09:45:00'
            ],
            [
                'title' => 'Fernando - Haircut',
                'start' => '2022-01-18 10:00:00',
                'end' => '2022-01-18 10:30:00'
            ],
            [
                'title' => 'Fernando - Haircut',
                'start' => '2022-01-18 10:30:00',
                'end' => '2022-01-18 11:15:00'
            ],
            [
                'title' => 'Fernando - Haircut',
                'start' => '2022-01-18 20:00:00',
                'end' => '2022-01-18 21:15:00'
            ],
            [
                'title' => 'Fernando - Haircut',
                'start' => '2022-01-18 21:15:00',
                'end' => '2022-01-18 22:30:00'
            ],
        ];
    }

}