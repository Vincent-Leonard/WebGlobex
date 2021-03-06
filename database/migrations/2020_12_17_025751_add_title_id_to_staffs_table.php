<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleIdToStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->unsignedBigInteger('title_id')->index()->after('department_id')->nullable();
            $table->foreign('title_id')->references('title_id')->on('titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->dropColumn('title_id');
        });
    }
}
