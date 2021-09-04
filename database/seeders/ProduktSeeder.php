<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProduktSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produkte')->insert([
            'id' => 1,
            'produkt_name' => "Apfel"
        ]);

        DB::table('produkte')->insert([
            'id' => 2,
            'produkt_name' => "Birne"
        ]);
        DB::table('produkte')->insert([
            'id' => 3,
            'produkt_name' => "Traube"
        ]);
        DB::table('produkte')->insert([
            'id' => 4,
            'produkt_name' => "Kuerbis"
        ]);
        DB::table('produkte')->insert([
            'id' => 5,
            'produkt_name' => "Kartoffel"
        ]);
        DB::table('produkte')->insert([
            'id' => 6,
            'produkt_name' => "Schnaps"
        ]);
        DB::table('produkte')->insert([
            'id' => 7,
            'produkt_name' => "Wein"
        ]);
        DB::table('produkte')->insert([
            'id' => 8,
            'produkt_name' => "Bier"
        ]);
        DB::table('produkte')->insert([
            'id' => 9,
            'produkt_name' => "Nudeln"
        ]);
        DB::table('produkte')->insert([
            'id' => 10,
            'produkt_name' => "Eier"
        ]);
        
    }
}
