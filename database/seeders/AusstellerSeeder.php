<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class AusstellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aussteller')->insert([
            'id' => 1,
            'aussteller_fullname' => str_random(10),
            'aussteller_beschreibung' => str_random(10),
            'aussteller_brandingname' => str_random(10),
            'aussteller_email' => str_random(10).'@gmail.com',
            'aussteller_telefonnummer' => str_random(10),
            'aussteller_websiteurl' => str_random(10),
            'aussteller_zonenfarbe' => str_random(10),
            'aussteller_bildurl' => str_random(10),
            'aussteller_jahre' => 2021,
            'aussteller_straße' => str_random(10),
            'aussteller_postleitzahl' => 6020,
            'aussteller_wohnort' => str_random(10)
        ]);
    }
}
