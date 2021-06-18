<?php

namespace Database\Factories;

use App\Models\Sponsoren;
use Illuminate\Database\Eloquent\Factories\Factory;

class SponsorenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Sponsoren::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sponsor_brandname' => $this->faker->words(1, true),
            'sponsor_vorname' => $this->faker->name(1, true),
            'sponsor_nachname' => $this->faker->name(1, true),
            'sponsor_websiteurl' => $this->faker->words(1, true),
            'sponsor_logourl' => $this->faker->words(1, true)
        ];
    }
}
