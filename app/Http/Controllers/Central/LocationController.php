<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Services\LocationService;
use App\Services\UserService;
use App\Models\Location;
class LocationController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function index(LocationService $locationService)
    {
        $locations = $locationService->getAll();
        return view('central.location.index',compact('locations'));
    }
    
    public function show(Location $location)
    {
        return view('central.location.user.index',compact('location'));
    }

    public function location_user_delete(Location $location, int $user_id, LocationService $locationService)
    {
        $locationService->deleteLocationUser($location,$user_id,);
        return redirect()->back();
    }

}
