<?php
namespace App\Services;
use App\Models\User;
use App\Services\Base\UserServiceBase;

class UserService extends UserServiceBase
{
    protected $model;

    public function __construct()
    {
        $this->model = new User;
    }

}