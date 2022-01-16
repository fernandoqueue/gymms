<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Services\LocationService;
use App\Services\UserService;
use App\Models\Location;
class DashboardController extends Controller
{
    /**
     * Display the dashboard view
     *
     * @return \Illuminate\View\View
     */
    public function index(LocationService $locationService)
    {
        $locationCount = $locationService->getAll()->count();
        return view('central.dashboard.index',compact('locationCount'));
    }
}
