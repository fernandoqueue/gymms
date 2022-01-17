<?php
namespace Database\Seeders\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => '2019-09-19 12:08:28',
                'updated_at'     => '2019-09-19 12:08:28',
            ],
        ];

        User::insert($users);
    }
}