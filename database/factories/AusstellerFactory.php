<?php

namespace Database\Factories;

use App\Models\Aussteller;
use Illuminate\Database\Eloquent\Factories\Factory;

class AusstellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Aussteller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'aussteller_fullname' => $this->faker->name(),
            'aussteller_beschreibung' => $this->faker->paragraphs(1, true),
            'aussteller_bildurl' => $this->faker->imageUrl('public/storage/images',640,480, null, false),
            'aussteller_telefonnummer' => $this->faker->phoneNumber(),
            'aussteller_websiteurl' => $this->faker->url(),
            'aussteller_brandingname' => $this->faker->words(1,true),
            'aussteller_email' => $this->faker->email(),
            'aussteller_istopaussteller' => $this->faker->boolean()
        ];
    }
}
