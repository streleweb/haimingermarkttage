<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProgrammpunktSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Programmpunkt::factory()->count(100)->create();
    }
}
