<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProduktreiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produktreiter')->insert([
            'id' => 7,
            'produkt_reiter_name' => "lebensmittel"
        ]);
        DB::table('produktreiter')->insert([
            'id' => 8,
            'produkt_reiter_name' => "gastronomie"
        ]);
        DB::table('produktreiter')->insert([
            'id' => 9,
            'produkt_reiter_name' => "handwerk"
        ]);
        DB::table('produktreiter')->insert([
            'id' => 10,
            'produkt_reiter_name' => "textil"
        ]);
        DB::table('produktreiter')->insert([
            'id' => 10,
            'produkt_reiter_name' => "allerlei"
        ]);
    }
}
