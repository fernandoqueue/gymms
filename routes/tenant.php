<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Features\UserImpersonation;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomainOrSubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', [App\Http\Controllers\Location\HomeController::class,'index']);
    
    Route::get('/impersonate/login/{token}', function ($token) {
        session(['admin_impersonation' => true]);
        return UserImpersonation::makeResponse($token);
    })->name('tenant.impersonate.auth.token');
    
    Route::get('/impersonation/destroy', function(Request $request){

        abort_if(!$request->session()->get('admin_impersonation'), 403);

        $currentLocationID = tenancy()->tenant->id;
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('central.dashboard.location.show', $currentLocationID));
        
    })->name('tenant.impersonate.auth.destroy')->middleware('auth');

    Route::middleware(['auth'])->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Location\DashboardController::class, 'dashboard'])->middleware(['auth'])->name('tenant.dashboard');
        
    });
    
    require __DIR__.'/auth.php';
});
