<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ausstellerfoto;
use Illuminate\Support\Str;
use DB;

class AusstellerfotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*foreach (Ausstellerfoto::all() as $ausstellerfoto){
            $aussteller = \App\Models\Aussteller::inRandomOrder()->take(rand(1,3))->pluck('id');
            $ausstellerfoto->aussteller()->attach($aussteller);
        }
        */

        DB::table('ausstellerfoto')->insert([
            'id' => 1,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 1
        ]);
    }
}
