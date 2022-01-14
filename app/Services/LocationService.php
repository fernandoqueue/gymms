<?php
namespace App\Services;
use App\Models\Location;
use App\Models\User;
use App\Services\UserService;
class LocationService
{

    public $model;

    public function __construct()
    {
        $this->model = new Location;
    }

    public function getAllWithDomains()
    {
        return $this->model->with('domains')->get();
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create($attributes)
    {
        
    }

    public function find($location_id)
    {
        return $this->model->find($location_id);
    }

    public function impersonateUserURL($location_id,$user_id)
    {
        $location = $this->find($location_id);
        $token = tenancy()->impersonate($location, $user_id, $location->route('tenant.dashboard'), 'web')->token;
        return $location->route('tenant.impersonate.auth.token', ['token' => $token]);
    }

}