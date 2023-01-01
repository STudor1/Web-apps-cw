<?php

namespace Database\Seeders;
use App\Models\Description;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $d = new Description;
        $d-> user_id = 1;
        $d-> description = "It's a me, Mario";
        $d->save();
    }
}
