<?php
namespace App\Services;

use App\Support\UserImpersonation;
use Auth;

class ImpersonationService
{
    private $impersonationSupport;

    public function __construct()
    {
        $this->impersonationSupport = new UserImpersonation;
    }
    public function authenticateImpersonationToken($sessionKey, $token)
    {
        return  $this->impersonationSupport->makeLoginResponse($sessionKey, $token);
    }

    public function logoutImpersonationSession($request)
    {
        return $this->impersonationSupport->makeLogoutResponse($request);
    }

}