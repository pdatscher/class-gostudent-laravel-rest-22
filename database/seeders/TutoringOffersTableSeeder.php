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
        $tutoringOffer = new \App\Models\TutoringOffer;
        $tutoringOffer->headline = "Günstige PHP Nachhilfe";
        $tutoringOffer->subject = "Serverseitige Webprogrammierung";
        $tutoringOffer->description = "Biete PHP Nachhilfe Sessions via Teams an. Bin gerade im 5. Semester und arbeite auch in meinem Praktikum viel mit PHP";

        $tutoringOffer->user()->associate(User::find(1));
        $tutoringOffer->save();


        $tutoringOffer2 = new \App\Models\TutoringOffer;
        $tutoringOffer2->headline = "Biete XML Tutoring";
        $tutoringOffer2->subject = "Semistrukturierte Datenbanken";
        $tutoringOffer2->description = "Lost bei XML und Co.? Ich kann gern weiterhelfen!";
        $tutoringOffer2->user()->associate(User::find(2));
        $tutoringOffer2->save();

        $tutoringOffer3 = new \App\Models\TutoringOffer;
        $tutoringOffer3->headline = "E-Learning Profi werden?";
        $tutoringOffer3->subject = "E-Learning";
        $tutoringOffer3->user()->associate(User::find(3));
        $tutoringOffer3->save();


        //add available dates to offers
        $date1 = new \App\Models\AvailableDate;
        $date1->day = DateTime::createFromFormat('Y-m-d', '2022-05-20');
        $date1->time = DateTime::createFromFormat('G-i', '18-30');

        $date2 = new \App\Models\AvailableDate;
        $date2->day = DateTime::createFromFormat('Y-m-d', '2022-05-22');
        $date2->time = DateTime::createFromFormat('G-i', '14-00');

        $tutoringOffer->dates()->saveMany([$date1,$date2]);

    }
}
