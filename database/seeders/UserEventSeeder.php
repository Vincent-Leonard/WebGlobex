<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Support\Facades\Hash;

class UserEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserEvent();
        $user->event_id = '1';
        $user->user_id = '5';
        $user->is_approved = '0';
        $user->save();

        $user = new UserEvent();
        $user->event_id = '3';
        $user->user_id = '5';
        $user->is_approved = '0';
        $user->save();

        $user = new UserEvent();
        $user->event_id = '4';
        $user->user_id = '5';
        $user->is_approved = '1';
        $user->save();

        $user = new UserEvent();
        $user->event_id = '5';
        $user->user_id = '5';
        $user->is_approved = '1';
        $user->save();

        $user = new UserEvent();
        $user->event_id = '7';
        $user->user_id = '5';
        $user->is_approved = '1';
        $user->save();
    }
}
