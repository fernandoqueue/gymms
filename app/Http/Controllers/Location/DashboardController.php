<?php

namespace App\Http\Controllers\Location;

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
        return view('dashboard');
    }

}
