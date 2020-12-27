<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id('staff_id');
            $table->string('nidn');
            $table->string('staff_name');
            $table->string('staff_email');
            $table->text('description');
            $table->text('staff_photo');
            $table->enum('staff_gender', ['0','1'])
                ->default('0')
                ->comment('0 = male, 1 = female');
            $table->string('staff_phone');
            $table->string('staff_line_account');
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
        Schema::dropIfExists('staffs');
    }
}
