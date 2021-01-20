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
        $event->is_group = '0';
        $event->event_date = Carbon::parse('2020-05-07');
        $event->duration = '6 months';
        $event->country = 'Japan';
        $event->city = 'Osaka';
        $event->organizer = 'L.E.O';
        $event->file = 'japan.jpg';
        $event->status = '0';
        $event->save();

        $event = new Event();
        $event->event = 'Papua Field Trip';
        $event->type = '1';
        $event->is_group = '1';
        $event->event_date = Carbon::parse('2020-06-28');
        $event->duration = '1 week';
        $event->country = 'Indonesia';
        $event->city = 'Jayapura';
        $event->organizer = 'UC';
        $event->file = 'papua.jpg';
        $event->status = '4';
        $event->save();

        $event = new Event();
        $event->event = 'Europe Student Exchange';
        $event->type = '0';
        $event->is_group = '0';
        $event->event_date = Carbon::parse('2020-09-10');
        $event->duration = '6 months';
        $event->country = 'France';
        $event->city = 'Paris';
        $event->organizer = 'J.V.P';
        $event->file = 'paris.jpg';
        $event->status = '3';
        $event->save();

        $event = new Event();
        $event->event = 'Brazil Study Tour';
        $event->type = '1';
        $event->is_group = '0';
        $event->event_date = Carbon::parse('2020-01-07');
        $event->duration = '2 weeks';
        $event->country = 'Brazil';
        $event->city = 'Sao Paolo';
        $event->organizer = 'V.F';
        $event->file = 'brazil.jpg';
        $event->status = '0';
        $event->save();

        $event = new Event();
        $event->event = 'Hongkong Student Exchange';
        $event->type = '0';
        $event->is_group = '0';
        $event->event_date = Carbon::parse('2020-01-07');
        $event->duration = '6 months';
        $event->country = 'China';
        $event->city = 'Hongkong';
        $event->organizer = 'Leonard Company';
        $event->file = 'hongkong.jpg';
        $event->status = '1';
        $event->save();

        $event = new Event();
        $event->event = 'Australia Student Exchange';
        $event->type = '0';
        $event->is_group = '0';
        $event->event_date = Carbon::parse('2020-06-23');
        $event->duration = '6 months';
        $event->country = 'Australia';
        $event->city = 'Sydney';
        $event->organizer = 'SYA Co.';
        $event->file = 'sydney.jpg';
        $event->status = '1';
        $event->save();

        $event = new Event();
        $event->event = 'India Trip';
        $event->type = '1';
        $event->is_group = '0';
        $event->event_date = Carbon::parse('2020-11-30');
        $event->duration = '1 week';
        $event->country = 'India';
        $event->city = 'Mumbai';
        $event->organizer = "V.S.A Company";
        $event->file = 'mumbai.jpg';
        $event->status = '2';
        $event->save();
    }
}
