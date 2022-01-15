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
        return $impersonationService->authenticateImpersonationToken($token, $this->impersonation_session_key);
    }
    public function logoutImpersonation(Request $request, ImpersonationService $impersonationService)
    {   
        abort_if( 
            !$request->session()->get($this->impersonation_session_key), 
            403 
        );
        
        $currentLocationID = $impersonationService->logoutImpersonationSession($request);
        return redirect(route('central.dashboard.location.show', $currentLocationID));
    }
}
