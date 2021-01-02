<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->role_name = 'Staff';
        $role->save();

        $role = new Role();
        $role->role_name = 'Lecturer';
        $role->save();

        $role = new Role();
        $role->role_name = 'Student';
        $role->save();
    }
}
