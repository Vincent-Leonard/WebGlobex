<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturer = new Lecturer();
        $lecturer->nip = '23812';
        $lecturer->nidn = '10001';
        $lecturer->lecturer_name = 'Jonathan';
        $lecturer->lecturer_email = 'jonathan@lecturer.com';
        $lecturer->description = 'jonathan';
        $lecturer->lecturer_photo = 'jonathan.png';
        $lecturer->lecturer_gender = '0';
        $lecturer->lecturer_phone = '081237238';
        $lecturer->lecturer_line_account = 'jonathan.id';
        $lecturer->department_id = '1';
        $lecturer->title_id = '1';
        $lecturer->jaka_id = '1';
        $lecturer->save();

        $lecturer = new Lecturer();
        $lecturer->nip = '23813';
        $lecturer->nidn = '10002';
        $lecturer->lecturer_name = 'Fernando';
        $lecturer->lecturer_email = 'fernando@lecturer.com';
        $lecturer->description = 'Fernando';
        $lecturer->lecturer_photo = 'Fernando';
        $lecturer->lecturer_gender = '0';
        $lecturer->lecturer_phone = '081237239';
        $lecturer->lecturer_line_account = 'Fernando';
        $lecturer->department_id = '1';
        $lecturer->title_id = '1';
        $lecturer->jaka_id = '1';
        $lecturer->save();
    }
}
