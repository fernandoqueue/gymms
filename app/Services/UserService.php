<?php
namespace App\Services;
use App\Models\Location;
use App\Models\User;
class UserService
{

    public function getAll()
    {
        return User::all();
    }

    public function getModel()
    {
        return new User;
    }

    public function deleteUser($user_id)
    {
        return User::find($user_id)->delete();
    }

    public function deleteSelectedUsers($users)
    {
        return User::whereIn('id',$users)->delete();
    }

}