<?php
namespace App\Services;
use App\Models\Location;
use App\Models\User;
use App\Services\UserService;
class LocationService
{

    public function getAll()
    {
        return Location::with('domains')->get();
    }

}