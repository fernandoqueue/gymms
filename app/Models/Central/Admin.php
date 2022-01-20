<?php

namespace App\Models\Central;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Stancl\Tenancy\Database\Concerns\CentralConnection;
use App\Support\HasAdvancedFilter;
class Admin extends Authenticatable
{
    use Notifiable;
    use HasAdvancedFilter;
    
    protected $guard = 'admins';
    public $orderable = [
        'id',
        'name',
        'email'
    ];

    public $filterable = [
        'id',
        'name',
        'email'
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
