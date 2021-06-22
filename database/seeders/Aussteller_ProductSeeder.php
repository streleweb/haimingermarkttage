<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class Aussteller_ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aussteller_product')->insert([
            'id' => 1,
            'aussteller_id' => 1,
            'product_id' => 1
        ]);
    }
}
