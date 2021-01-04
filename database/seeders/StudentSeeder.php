<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Student();
        $student->nim = '0706011910023';
        $student->student_name = 'Vincent';
        $student->student_email = 'vincent@student.com';
        $student->batch = '2019';
        $student->description = 'sultan';
        $student->student_photo = 'vincent.png';
        $student->student_gender = '0';
        $student->student_phone = '0812372385';
        $student->student_line_account = 'vincent.id';
        $student->department_id = '1';
        $student->save();
    }
}
