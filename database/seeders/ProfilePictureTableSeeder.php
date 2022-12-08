<?php

namespace Database\Seeders;
use App\Models\ProfilePicture;
use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilePictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p = new ProfilePicture;
        $p-> user_id = 1;
        $p-> picture = "hello";
        $p->save();

        #ProfilePicture::factory()->count(2)->create();
        ##$user = User::factory()->create();
 
        $pic = ProfilePicture::factory()
            ->count(2)
            ->create();
    }
}
