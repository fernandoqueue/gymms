<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LocationStoreRequest;
use App\Services\LocationService;

class LocationController extends Controller
{

    // public static function getCustomColumns(): array
    // {
    //     return [
    //         'id',
    //         'name',
    //         'address',
    //     ];
    // }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function index(LocationService $locationService)
    {
        $locations = $locationService->getAllWithDomains();
        return view('central.location.index',compact('locations'));
    }
    
    public function create(Request $request)
    {
        return view('central.location.create');
    }

    public function store(LocationStoreRequest $request, LocationService $locationService)
    {   
        $location = $locationService->create($request);
        return redirect()->route('central.dashboard.location.show', $location);
    }

    public function show($location_id, LocationService $locationService)
    {
        $location = $locationService->find($location_id);
        return view('central.location.user.index',compact('location'));
    }

    public function location_user_impersonate($location_id,$user_id,LocationService $locationService)
    {
        $url = $locationService->impersonateUserURL($location_id,$user_id);
        return redirect()->away($url);
    }
}
