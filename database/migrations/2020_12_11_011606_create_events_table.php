<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('event');
            $table->enum('type', ['0', '1'])
                ->default('0')
                ->comment('0 = student exchange, 1 = student excursion');
            $table->enum('is_group', ['0', '1'])
                ->default('0')
                ->comment('0 = no, 1 = yes');    
            $table->date('event_date');
            $table->string('duration');
            $table->string('country');
            $table->string('city');
            $table->string('organizer');
            $table->text('file');
            $table->enum('status', ['0', '1', '2', '3'])
                ->default('0')
                ->comment('0 = pending, 1 = approved, 2 = rejeced, 3 = revision');
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
        Schema::dropIfExists('events');
    }
}
