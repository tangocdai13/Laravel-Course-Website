<?php

namespace Modules\User\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = 'Dai';
        $user->email = 'tangocdai13@gmail.com';
        $user->password = Hash::make('123456');
        $user->group_id = 1;

        $user->save();
    }
}
