<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->varchar('nim');
            $table->varchar('student_name');
            $table->varchar('student_email');
            $table->int('batch');
            $table->text('description');
            $table->text('student_photo');
            $table->enum('student_gender', ['0','1'])
                ->default('0')
                ->comment('0 = male, 1 = female');
            $table->varchar('student_phone');
            $table->varchar('student_line_account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
