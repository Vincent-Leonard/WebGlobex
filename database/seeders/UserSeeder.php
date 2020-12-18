<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Leo (Admin)';
        $user->email = 'leo@admin.com';
        $user->password = Hash::make('12345678');
        $user->is_login = 0;
        // $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name = 'Leo (Lecturer)';
        $user->email = 'leo@lecturer.com';
        $user->password = Hash::make('12345678');
        $user->is_login = 0;
        // $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->name = 'Leo (Student)';
        $user->email = 'leo@student.com';
        $user->password =  Hash::make('12345678');
        $user->is_login = 0;
        // $user->role_id = 3;
        $user->save();
    }
}
