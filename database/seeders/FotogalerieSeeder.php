<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FotogalerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Fotogalerie::factory()->count(100)->create();
    }
}
