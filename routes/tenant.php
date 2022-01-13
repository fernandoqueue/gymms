<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Features\UserImpersonation;
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
    Route::get('/impersonate/{token}', function ($token) {
        return UserImpersonation::makeResponse($token);
    })->name('tenant.impersonate.auth.token');


    Route::middleware(['auth'])->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Location\DashboardController::class, 'dashboard'])->middleware(['auth'])->name('tenant.dashboard');
        
    });
    
    require __DIR__.'/auth.php';
});
