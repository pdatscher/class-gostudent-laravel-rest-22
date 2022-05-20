<?php

namespace Database\Seeders;

use App\Models\TutoringOffer;
use App\Models\AvailableDate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class TutoringOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutoringOffer = App\Models\TutoringOffer;
        $tutoringOffer->$headline = "Günstige PHP Nachhilfe";
        $tutoringOffer->$subject = "Serverseitige Webprogrammierung";
        $tutoringOffer->$description = "Biete PHP Nachhilfe Sessions via Teams an. Bin gerade im 5. Semester und arbeite auch in meinem Praktikum viel mit PHP";

        $user = User::all()->first();
        $tutoringOffer->user()->associate($user);

        $tutoringOffer->save();
    }
}
