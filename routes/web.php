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
        
    $arr = [
        'information' =>[
            'name' => 'Champions of West Covina',
            'street1' => '8175 E Kaiser Blvd',
            'street2' => null,
            'city' => 'Anaheim Hills',
            'state' => 'La Puente',
            'zip' => '91744'
        ]
    ];

    $locationModel= new \App\Models\Location;

    //return $locationModel->find('a9b6f699-9b9b-4bd5-8be5-571ec08103a9')->information['zip'];

    return $locationModel->create([
        'plan' => true,
        'information' =>[
        'name' => 'Champions of West Covina',
        'street1' => '8175 E Kaiser Blvd',
        'street2' => null,
        'city' => 'Anaheim Hills',
        'state' => 'La Puente',
        'zip' => '91744'
    ]]);
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth'],
    ],function () {

    //Dashbaord
    Route::get('/', [App\Http\Controllers\Central\DashboardController::class, 'index'])->name('central.dashboard.index');

    //Gym
    Route::get('/location', [App\Http\Controllers\Central\LocationController::class, 'index'])->name('central.dashboard.location.index');
    Route::get('location/create', [App\Http\Controllers\Central\LocationController::Class, 'create'])->name('central.dashboard.location.create');
    Route::post('location', [App\Http\Controllers\Central\LocationController::Class, 'store'])->name('central.dashboard.location.store');
    Route::get('/location/{location_id}', [App\Http\Controllers\Central\LocationController::class, 'show'])->name('central.dashboard.location.show');
    Route::get('/location/{location_id}/{user_id}/impersonate', [App\Http\Controllers\Central\LocationController::class, 'location_user_impersonate'])->name('central.dashboard.location.user.impersonate');
});

require __DIR__.'/auth.php';
