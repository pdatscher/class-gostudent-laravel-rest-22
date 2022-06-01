<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Patrick Datscher";
        $user->email = "datscher@gmail.com";
        $user->skills = "Webentwicklung (Frontend / Backend), UX Design";
        $user->password = bcrypt('secret');
        $user->isTutor = true;
        $user->save();

        $user2 = new User;
        $user2->name = "Sarah Lang";
        $user2->email = "lang@gmail.com";
        $user2->skills = "E-Learning, OE/PE, Kommunikation, Marketing";
        $user2->password = bcrypt('secret');
        $user2->isTutor = true;
        $user2->save();

        $user3 = new User;
        $user3->name = "Marco Klein";
        $user3->email = "klein@gmail.com";
        $user3->password = bcrypt('secret');
        $user3->isTutor = false;
        $user3->save();


        // add images to users
        $image1 = new Image;
        $image1->title = "Userbild 1";
        $image1->url = "https://junq.at/wp-content/uploads/2018/02/bazibaer.png";
        $user->images()->save($image1);
        $user->save();

        $image2 = new Image;
        $image2->title = "Userbild 2";
        $image2->url = "https://junq.at/wp-content/uploads/2021/12/sarahlang.png";
        $user2->images()->save($image2);
        $user2->save();


        $image3 = new Image;
        $image3->title = "Userbild 3";
        $image3->url = "https://junq.at/wp-content/uploads/2017/01/Foto-Klein-Marco-1.jpg";
        $user3->images()->save($image3);
        $user3->save();
    }
}
