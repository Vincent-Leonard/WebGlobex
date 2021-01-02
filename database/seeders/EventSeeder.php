<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event();
        $event->event = 'Japan Student Exchange';
        $event->type = '0';
        $event->event_date = Carbon::parse('2020-01-07');
        $event->duration = '6 months';
        $event->country = 'Japan';
        $event->city = 'Osaka';
        $event->organizer = 'Leonard Company';
        $event->file = 'picture';
        $event->status = '0';
        $event->save();
    }
}
