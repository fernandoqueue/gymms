<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'dashboard_view',
                'created_at' => '2019-09-19 12:14:15',
                'updated_at' => '2019-09-19 12:14:15',
            ],
            [
                'id'         => '2',
                'title'      => 'dashboard_edit',
                'created_at' => '2019-09-19 12:14:15',
                'updated_at' => '2019-09-19 12:14:15',
            ],      
        ];

        Permission::insert($permissions);
    }
}
