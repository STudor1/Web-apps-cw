<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l = new Lecturer;
        $l->name = "Sheldon";
        $l->email = "sheldon@email.com";
        $l->save();

        //Lecturer::factory()->count(4)->create();
        
        //I want to create 4 lecturers with 2 posts each
        Lecturer::factory(4)
            ->has(Post::factory()->count(2))
            ->create();
    }
}
