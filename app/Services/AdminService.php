<?php
namespace App\Services;
use App\Models\Central\Admin;
use App\Services\Base\UserServiceBase;

class AdminService extends UserServiceBase
{
    protected $model;

    public function __construct()
    {
        $this->model = new Admin;
    }
}