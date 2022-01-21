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
        $events = [
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

       $availableSlots = app()->make(BookingService::class)
                              ->getAvailableTimeSlots();

        return view('central.welcome',compact('availableSlots','events'));
    }
}
