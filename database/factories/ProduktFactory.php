<?php

namespace Database\Factories;

use App\Models\Produkt;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduktFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produkt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'produkt_name' => $this->faker->name(),
        ];
    }
}
