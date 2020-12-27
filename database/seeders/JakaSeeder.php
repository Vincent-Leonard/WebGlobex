<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jaka;

class JakaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jaka = new Jaka();
        $jaka->jaka_name = 'Dosen Senior';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->jaka_name = 'Dosen Junior';
        $jaka->save();
    }
}
