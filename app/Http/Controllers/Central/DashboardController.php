<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        echo '<h1>Current Locations</h1>';
        foreach(\App\Models\Location::all() as $location)
        {
            echo $location->id . '<br>';
        }
    }

}
