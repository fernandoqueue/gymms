<?php

namespace App\Http\Controllers\Location;

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
        return \App\Models\User::all();
    }

}
