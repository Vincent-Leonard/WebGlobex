<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id('lecturer_id');
            $table->varchar('nip');
            $table->varchar('nidn');
            $table->varchar('lecturer_name');
            $table->varchar('lecturer_email');
            $table->text('description');
            $table->text('lecturer_photo');
            $table->enum('lecturer_gender', ['0','1'])
                ->default('0')
                ->comment('0 = male, 1 = female');
            $table->varchar('lecturer_phone');
            $table->varchar('lecturer_line_account');
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
        Schema::dropIfExists('lecturers');
    }
}
