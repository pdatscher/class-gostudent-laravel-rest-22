<?php

namespace Database\Seeders;

use App\Models\AvailableDate;
use App\Models\ScheduledTutoring;
use App\Models\TutoringOffer;
use Illuminate\Database\Seeder;

class ScheduledTutoringsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scheduled1 = new ScheduledTutoring();
        $scheduled1->user()->associate(User::find(2));
        $scheduled1->tutoring()->associate(TutoringOffer::find(3));
        $scheduled1->date()->assosciate(AvailableDate::find(1));
        $scheduled1->save();
    }
}
