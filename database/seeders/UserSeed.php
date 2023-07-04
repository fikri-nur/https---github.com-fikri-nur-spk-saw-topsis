<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'           => 'admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
            [
                'name'       => 'fikri',
                'email'          => 'fikri@user.com',
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
