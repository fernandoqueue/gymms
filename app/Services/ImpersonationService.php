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
    public function authenticateImpersonationToken($token)
    {
        return  $this->impersonationSupport->makeLoginResponse($token);
    }

    public function logoutImpersonationSession($request)
    {
        return $this->impersonationSupport->makeLogoutResponse($request);
    }

}