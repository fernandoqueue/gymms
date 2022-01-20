<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;
use DateTime;
use App\Services\BookingService;
class HomeController extends Controller
{
    public function index()
    {
        $schedules = [
            [
                'start' => '2022-11-18 09:00:00',
                'end' => '2022-11-18 17:00:00',
            ],
            [
                'start' => '2022-11-18 19:00:00',
                'end' => '2022-11-18 23:00:00',
            ]   
        ];
        $events = [
            [
                'start' => '2022-11-18 09:30:00',
                'end' => '2022-11-18 09:45:00'
            ],
            [
                'start' => '2022-11-18 10:00:00',
                'end' => '2022-11-18 10:30:00'
            ],
            [
                'start' => '2022-11-18 10:30:00',
                'end' => '2022-11-18 11:15:00'
            ],
            [
                'start' => '2022-11-18 20:00:00',
                'end' => '2022-11-18 21:15:00'
            ],
            [
                'start' => '2022-11-18 21:15:00',
                'end' => '2022-11-18 22:30:00'
            ],
        ];
        $availableSlots = [];
        foreach($schedules as $schedule){
            foreach(app()->make(BookingService::class)->getAvailableTimeSlots($schedule,$events) as $slot)
            {
                $availableSlots[] = $slot;
            }
        }
        return view('central.welcome',compact('availableSlots'));
    }
}
