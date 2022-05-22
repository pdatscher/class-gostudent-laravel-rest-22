<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user->email = "test1@gmail.com";
        $user->password = bcrypt('secret');
        $user->isTutor = true;
        $user->save();

        $user2 = new User;
        $user2->name = "Julia Linsbod";
        $user2->email = "test2@gmail.com";
        $user2->password = bcrypt('secret');
        $user2->isTutor = true;
        $user2->save();

        $user3 = new User;
        $user3->name = "Marco Klein";
        $user3->email = "test3@gmail.com";
        $user3->password = bcrypt('secret');
        $user3->isTutor = false;
        $user3->save();
    }
}
