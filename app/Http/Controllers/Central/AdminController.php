<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests\LocationStoreRequest;
use App\Services\AdminService;

class AdminController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function index(AdminService $adminService)
    {
        $admins = $adminService->getAll();
        return view('central.admin.index',compact('admins'));
    }
    
    public function create(Request $request)
    {
        return view('central.admin.create');
    }

    public function store(LocationStoreRequest $request, AdminService $adminService)
    {   
        $admins = $adminService->create($request);
        return redirect()->route('central.admin.show', $admins);
    }

    public function show($admin_id, AdminService $adminService)
    {
        $admins = $adminService->find($admin_id);
        return view('central.admin.index',compact('admins'));
    }

}
