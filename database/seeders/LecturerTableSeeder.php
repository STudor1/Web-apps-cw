<?php

namespace Database\Seeders;

use App\Models\Lecturer;
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

        Lecturer::factory()->count(4)->create();
    }
}
