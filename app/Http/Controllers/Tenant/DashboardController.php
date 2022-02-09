<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class DashboardController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // abort_if(Gate::denies('dashboard_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('tenant.dashboard');
    }

}
