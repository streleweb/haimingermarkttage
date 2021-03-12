<?php

namespace Database\Factories;

use App\Models\Fotogalerie;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotogalerieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fotogalerie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fotogalerie_fotoname' => $this->faker->words(1,true),
            'fotogalerie_fotobeschreibung' => $this->faker->paragraphs(1, true),
            'fotogalerie_fotourl' => $this->faker->imageUrl('public/storage/images',640,480, null, false)
        ];
    }
}
