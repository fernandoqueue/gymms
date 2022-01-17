<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Services\ImpersonationService;
use App\Http\Controllers\Controller;

class ImpersonateController extends Controller
{
    private $impersonation_session_key;

    public function __construct()
    {
        $this->impersonation_session_key = config('session.impersonation_session_key');
    }

    public function loginImpersonation($token, ImpersonationService $impersonationService)
    {
        return $impersonationService->authenticateImpersonationToken($this->impersonation_session_key, $token);
    }
    public function logoutImpersonation(Request $request, ImpersonationService $impersonationService)
    {   
        return $impersonationService->logoutImpersonationSession($request);
    }
}