<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SponsorenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sponsoren::factory()->count(100)->create();
    }
}
