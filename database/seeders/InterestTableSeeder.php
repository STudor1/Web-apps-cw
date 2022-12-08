<?php

namespace Database\Seeders;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $i = new Interest;
        $i->interest = "Cooking";
        $i->save();
        $i->users()->attach(1);
        $i->users()->attach(3);

    }
}
