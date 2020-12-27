<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Title;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = new Title();
        $title->title_name = 'Dosen';
        $title->timestamps = false;
        $title->save();

        $title = new Title();
        $title->title_name = 'Dekan';
        $title->timestamps = false;
        $title->save();
    }
}
