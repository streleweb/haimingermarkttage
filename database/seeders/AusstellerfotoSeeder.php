<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ausstellerfoto;

class AusstellerfotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory kennt er nicht
        factory(Ausstellerfoto::class, 10)->create();

        foreach (Ausstellerfoto::all() as $ausstellerfoto){
            $aussteller = \App\Models\Aussteller::inRandomOrder()->take(rand(1,3))->pluck('id');
            $ausstellerfoto->aussteller()->attach($aussteller);
        }

    }
}
