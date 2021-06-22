<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProgrammSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Programm::factory()->count(100)->create();
    }
}
