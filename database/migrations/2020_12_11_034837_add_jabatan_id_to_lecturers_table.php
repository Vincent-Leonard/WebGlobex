<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJabatanIdToLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->unsignedBigInteger('jabatan_id')->index()->after('prodi_id');

            $table->foreign('jabatan')->references('id')->on('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->dropColumn('jabatan_id');
        });
    }
}
