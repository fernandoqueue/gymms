<?php
namespace App\Services;
use App\Models\Central\Admin;
class AdminService
{
    private $model;

    public function __construct()
    {
        $this->model = new Admin;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function find($admin_id)
    {
        return $this->model->find($admin_id);
    }

    public function deleteUser($admin_id)
    {
        return $this->find($admin_id)->delete();
    }

    public function deleteSelectedadmins($admins)
    {
        return $this->model->whereIn('id',$admins)->delete();
    }

    public function advancedFilterWithPagination($columns,$filters,$paginate)
    {
        return $this->model->advancedFilter($filters)
                           ->cursorPaginate($paginate,'*','page');
    }

}