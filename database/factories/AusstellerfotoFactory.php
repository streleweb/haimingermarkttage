<?php

namespace Database\Factories;

use App\Models\Ausstellerfoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class AusstellerfotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Ausstellerfoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'ausstellerfoto_name' => $this->faker->words(2, true),
            'ausstellerfoto_url' => $this->faker->imageUrl('public/storage/images',640,480, null, false),
        ];
    }
}
