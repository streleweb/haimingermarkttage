<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class ProgrammpunktSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programmpunkt')->insert([
            'id' => 1,
            'programmpunkt_titel' => str_random(10),
            'programmpunkt_beschreibung' => str_random(10),
            'programm_id' => 1,
        ]);
    }
}
