<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = new Department();
        $department->initial = 'IMT';
        $department->department_name = 'Informatics';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'ISB';
        $department->department_name = 'Information System Business';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'VCD';
        $department->department_name = 'Visual Communication Design';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'CB';
        $department->department_name = 'Culinary Business';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'HTB';
        $department->department_name = 'Hotel Tourism Business';
        $department->timestamps = false;
        $department->save();
        
        $department = new Department();
        $department->initial = 'IBM';
        $department->department_name = 'International Business Management';
        $department->timestamps = false;
        $department->save();
        
        $department = new Department();
        $department->initial = 'BMI';
        $department->department_name = 'Business Management International';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'ACC';
        $department->department_name = 'Accounting';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'MED';
        $department->department_name = 'Medical';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'FPD';
        $department->department_name = 'Fashion Product Design';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'COM';
        $department->department_name = 'Communication';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'PSY';
        $department->department_name = 'Psychology';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'INA';
        $department->department_name = 'Interior Architecture';
        $department->timestamps = false;
        $department->save();

        $department = new Department();
        $department->initial = 'FTP';
        $department->department_name = 'Food Tech';
        $department->timestamps = false;
        $department->save();
    }
}
