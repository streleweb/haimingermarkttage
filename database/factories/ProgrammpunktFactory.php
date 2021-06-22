<?php

namespace Database\Factories;

use App\Models\Programmpunkt;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammpunktFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Programmpunkt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'programmpunkt_titel' => $this->faker->paragraphs(1, true),
            'programmpunkt_beschreibung' => $this->faker->paragraphs(1, true)
        ];
    }
}
