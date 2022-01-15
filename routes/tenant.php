<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;;
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

    Route::get('/', [App\Http\Controllers\Tenant\HomeController::class,'index']);
    
    Route::get('/impersonate/login/{token}', [App\Http\Controllers\Tenant\ImpersonateController::class,'loginImpersonation'])->name('tenant.impersonate.auth.token');

    Route::middleware(['auth'])->group(function () {
        //Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Tenant\DashboardController::class, 'dashboard'])->middleware(['auth'])->name('tenant.dashboard.index');
        //Impersonation logout
        Route::get('/impersonation/destroy', [App\Http\Controllers\Tenant\ImpersonateController::class, 'logoutImpersonation'])->name('tenant.impersonate.auth.destroy');
        
    });
    
    Route::name('tenant.')->group(function () {
        require __DIR__.'/tenant-auth.php';
    });
    
});
