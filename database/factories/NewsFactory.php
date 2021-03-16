<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'news_anrede' => $this->faker->words(1, true),
            'news_vorname' => $this->faker->name(1, true),
            'news_nachname' => $this->faker->name(1, true),
            'news_email' => $this->faker->unique()->safeEmail,
        ];
    }
}
