<?php
namespace App\Services\Base;

class UserServiceBase
{
    protected $model;

    public function __construct()
    {
        
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function find($user_id)
    {
        return $this->model->find($user_id);
    }

    public function deleteUser($user_id)
    {
        return $this->find($user_id)->delete();
    }

    public function deleteSelectedUsers($users)
    {
        return $this->model->whereIn('id',$users)->delete();
    }

    public function advancedFilterWithPagination($columns,$filters,$paginate)
    {
        return $this->model->advancedFilter($filters)
                           ->cursorPaginate($paginate,'*','page');
    }

}