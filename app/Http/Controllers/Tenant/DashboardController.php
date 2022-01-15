<?php

namespace App\Http\Controllers\Tenant;

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
        return view('tenant.dashboard');
    }

}
