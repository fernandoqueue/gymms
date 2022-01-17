<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Services\ImpersonationService;
use App\Http\Controllers\Controller;

class ImpersonateController extends Controller
{
    public function __construct()
    {
  
    }

    public function loginImpersonation($token, ImpersonationService $impersonationService)
    {
        return $impersonationService->authenticateImpersonationToken($token);
    }
    public function logoutImpersonation(Request $request, ImpersonationService $impersonationService)
    {   
        return $impersonationService->logoutImpersonationSession($request);
    }
}