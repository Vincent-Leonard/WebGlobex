<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = new Staff();
        $staff->nidn = '20001';
        $staff->staff_name = 'Leo';
        $staff->staff_email = 'leo@staff.com';
        $staff->description = 'ganteng';
        $staff->staff_photo = 'leo.png';
        $staff->staff_gender = '0';
        $staff->staff_phone = '0812612712';
        $staff->staff_line_account = 'leo.id';
        $staff->department_id = '1';
        $staff->title_id = '1';
        $staff->save();

        $staff = new Staff();
        $staff->nidn = '20002';
        $staff->staff_name = 'Santoso';
        $staff->staff_email = 'santoso@staff.com';
        $staff->description = 'jelek';
        $staff->staff_photo = 'santoso.png';
        $staff->staff_gender = '0';
        $staff->staff_phone = '0812302943';
        $staff->staff_line_account = 'santoso.id';
        $staff->department_id = '5';
        $staff->title_id = '2';
        $staff->save();
    }
}
