<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DatePeriod;
use DateTime;
class HomeController extends Controller
{
    public function index()
    {
        //Foreach timeblock do below. Get timeblocks in array and loop through
        $schedule = [
            'start' => '2022-11-18 09:00:00',
            'end' => '2022-11-18 17:00:00',
        ];
        //start and stop time for block
        $start = Carbon::instance(new DateTime($schedule['start']));
        $end = Carbon::instance(new DateTime($schedule['end']));
        //Get all appointments
        $events = [
            [
                'created_at' => '2022-11-18 10:00:00',
                'updated_at' => '2022-11-18 12:00:00',
            ],
            [
                'created_at' => '2022-11-18 14:00:00',
                'updated_at' => '2022-11-18 15:30:00',
            ],
        ];

        echo 'Time Block: ' . 'From: <b>09:00:00 to 17:00:00</b> <br> ';
        echo 'Schedule Appointments:<br>';
        echo '1) <b>10:00:00 - 12:00:00</b> <br>';
        echo '2) <b>14:00:00 - 15:30:00</b> <br><br>';
        echo '<u style="padding-bottom:5px">Available Times(30 min intervals)</u><br>';

        $minSlotHours = 0;
        $minSlotMinutes = 30;
        $minInterval = CarbonInterval::hour($minSlotHours)->minutes($minSlotMinutes);

        $reqSlotHours = 0;
        $reqSlotMinutes = 30;
        $reqInterval = CarbonInterval::hour($reqSlotHours)->minutes($reqSlotMinutes);
        $results = [];
        foreach(new DatePeriod($start, $minInterval, $end) as $slot){
            $stringResults = '';
            $to = $slot->copy()->add($reqInterval);

            // $stringResults = $slot->toDateTimeString() . ' to ' . $to->toDateTimeString();
            $stringResults = $slot->format('H:i');
            if($this->slotAvailable($slot, $to, $events)){
                $results[] = $stringResults;
            }

            // $results[] = $stringResults;
        }

        foreach($results as $slot)
        {
            echo "<span style=\"color:red\">${slot}</span><br>";
        }
        return;

        return view('central.welcome');
    }
    private function slotAvailable($from, $to, $events){
        foreach($events as $event){
            $eventStart = Carbon::instance(new DateTime($event['created_at']));
            $eventEnd = Carbon::instance(new DateTime($event['updated_at']));
            if($from->between($eventStart, $eventEnd) && $to->between($eventStart, $eventEnd)){
                return false;
            }
        }
        return true;
    }
}
