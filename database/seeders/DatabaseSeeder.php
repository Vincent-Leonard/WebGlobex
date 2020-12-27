<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Model::unguard();

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            DepartmentSeeder::class,
            JakaSeeder::class,
            TitleSeeder::class,
        ]);

        Model::reguard();
    }
}
