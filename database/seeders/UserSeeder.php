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
        $user->email = 'leo@staff.com';
        $user->password = Hash::make('12345678');
        $user->role_id = '1';
        $user->is_login = '0';
        $user->is_admin = '1';
        $user->staff_id = '1';
        $user->save();

        $user = new User();
        $user->email = 'jonathan@lecturer.com';
        $user->password = Hash::make('12345678');
        $user->role_id = '2';
        $user->is_login = '0';
        $user->is_admin = '0';
        $user->lecturer_id = '1';
        $user->save();

        $user = new User();
        $user->email = 'vincent@student.com';
        $user->password =  Hash::make('12345678');
        $user->role_id = '3';
        $user->is_login = '0';
        $user->is_admin = '0';
        $user->student_id = '1';
        $user->save();

        $user = new User();
        $user->email = 'fernando@lecturer.com';
        $user->password = Hash::make('12345678');
        $user->role_id = '2';
        $user->is_login = '0';
        $user->is_admin = '1';
        $user->lecturer_id = '2';
        $user->save();

        $user = new User();
        $user->email = 'valentino@student.com';
        $user->password =  Hash::make('12345678');
        $user->role_id = '3';
        $user->is_login = '0';
        $user->is_admin = '0';
        $user->student_id = '2';
        $user->save();
    }
}
