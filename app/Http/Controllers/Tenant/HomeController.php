<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return 'hello from home controller';
    }

}
