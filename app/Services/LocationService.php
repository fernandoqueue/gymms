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
        $location = $this->model->create([
            'name' => $attributes->name,
            'address1' => $attributes->address1,
            'address2' => $attributes->address2,
            'city' => $attributes->city,
            'state' => $attributes->state,
            'zip' => $attributes->zip,
        ]);

        $location->domains()->create([
            'domain' => $attributes->domain,
        ]);

        return $location;

    }

    public function find($location_id)
    {
        return $this->model->find($location_id);
    }

    public function impersonateUserURL($location_id,$user_id)
    {
        $location = $this->find($location_id);
        $token = tenancy()->impersonate($location, $user_id, $location->route('tenant.dashboard.index'), 'web')->token;
        return $location->route('tenant.impersonate.auth.token', ['token' => $token]);
    }

}