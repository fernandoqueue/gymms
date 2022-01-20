<?php
namespace App\Services;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;

class BookingService
{
    private $serviceTimeIntervals;
    private $timeSlotIntervals;
    public function __construct($serviceTimeIntervals = 1,$timeSlotsIntervals = 30)
    {
        $this->timeSlotIntervals = CarbonInterval::minutes($timeSlotsIntervals);
        $this->serviceTimeIntervals = CarbonInterval::minutes($serviceTimeIntervals);
    }

    public function getAvailableTimeSlots($schedule,$events)
    {
        $availableSlots = [];
        $timeSlots = CarbonPeriod::create($schedule['start'],$this->timeSlotIntervals,$schedule['end'])->excludeEndDate();

        foreach($timeSlots as $timeSlot)
        {
            $endTimeSlot = $timeSlot->copy()->add($this->serviceTimeIntervals);
            if($this->checkSlotAvailibility($timeSlot,$endTimeSlot,$events)) // Check available time slots
            {
                if(!($endTimeSlot > Carbon::create($schedule['end'])) ) // chceck service time requirement will go beyond time schedule
                {
                    $availableSlots[] = $timeSlot->format('g:i A');
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

}