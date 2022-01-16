<?php
namespace App\Services;

use Stancl\Tenancy\Features\UserImpersonation;
use Auth;

class ImpersonationService
{
    public function authenticateImpersonationToken($token, $sessionKey)
    {
        $response = UserImpersonation::makeResponse($token);
        session([ $sessionKey => true ]);
        return $response;
    }

    public function logoutImpersonationSession($request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

}