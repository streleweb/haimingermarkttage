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

        DB::table('ausstellerfoto')->insert([
            'id' => 2,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 2
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 3,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 3
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 4,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 4
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 5,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 5
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 6,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 6
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 7,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 7
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 8,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 8
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 9,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 9
        ]);

        DB::table('ausstellerfoto')->insert([
            'id' => 10,
            'ausstellerfoto_name' => str_random(10),
            'ausstellerfoto_url' => str_random(10),
            'aussteller_id' => 10
        ]);
    }
}
