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
        $jaka->jaka_name = 'Pengajar';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->jaka_name = 'Asisten';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->jaka_name = 'Lektor';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->jaka_name = 'Lektor Kepala';
        $jaka->save();

        $jaka = new Jaka();
        $jaka->jaka_name = 'Profesor';
        $jaka->save();

    }
}
