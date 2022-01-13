<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function(){

    return \App\Models\Location::with('domains')->get()[0]['domains'][0]->domain;

});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth'],
    ],function () {

    //Dashbaord
    Route::get('/', [App\Http\Controllers\Central\DashboardController::class, 'index'])->name('central.dashboard.index');

    //Gym
    Route::get('/location', [App\Http\Controllers\Central\LocationController::class, 'index'])->name('central.dashboard.location.index');
    Route::get('/location/{location_id}', [App\Http\Controllers\Central\LocationController::class, 'show'])->name('central.dashboard.location.show');
    Route::get('/location/{location}/{user_id}', [App\Http\Controllers\Central\LocationController::class, 'location_user_delete'])->name('central.dashboard.location.user.delete');

});

require __DIR__.'/auth.php';
