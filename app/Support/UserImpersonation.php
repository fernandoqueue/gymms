<?php
namespace App\Support;

use Stancl\Tenancy\Features\UserImpersonation as baseImpersonation;
use Stancl\Tenancy\Database\Models\ImpersonationToken;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserImpersonation extends baseImpersonation
{

    private $impersonation_session_key;

    public function __construct()
    {
        $this->impersonation_session_key = config('session.impersonation_session_key');
    }

    public function makeLoginResponse($token, int $ttl = null)
    {
        $token = ImpersonationToken::findOrFail($token);
        $ttl = $ttl ?? static::$ttl;

        abort_if(
            (string) $token->tenant_id !== ((string) tenant()->getTenantKey())
            OR
            $token->created_at->diffInSeconds(Carbon::now()) > $ttl
            ,403
        );

        Auth::guard($token->auth_guard)->loginUsingId($token->user_id);

        $token->delete();
        session([ $this->impersonation_session_key => true ]);
        return redirect($token->redirect_url);
    }

    public function makeLogoutResponse($request)
    {
        abort_if( 
            !$request->session()->get($this->impersonation_session_key)
            ,403
        );

        $currentLocationID = tenancy()->tenant->id;
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect(route('central.dashboard.location.show', $currentLocationID));
    }
}