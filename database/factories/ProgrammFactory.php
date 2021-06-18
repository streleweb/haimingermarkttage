<?php

namespace Database\Factories;

use App\Models\Programm;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Programm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'programm_titel' => $this->faker->paragraphs(1, true),
            'programm_beschreibung' => $this->faker->paragraphs(1, true)
        ];
    }
}
