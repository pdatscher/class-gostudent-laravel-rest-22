<?php

namespace Database\Seeders;

use App\Models\TutoringOffer;
use App\Models\AvailableDate;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Time;


class AvailableDatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //HINFÄLLIG - DATES WERDEN IM TUTORING OFFERS SEEDER HINZUGEFÜGT

        /*$availableDate = new \App\Models\AvailableDate;
        //$availableDate->day = new Date("2022-05-20");
        $availableDate->day = DateTime::createFromFormat('Y-m-d', '2022-05-20');
        $availableDate->time = DateTime::createFromFormat('G-i', '18-30');



        $availableDate->save();*/
    }
}
