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
    protected $model = \App\Models\News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'news_titel' => $this->faker->paragraphs(1, true),
            'news_textfeld' => $this->faker->paragraphs(1, true),
            'news_bild_url' => $this->faker->imageUrl('public/storage/images',640,480, null, false)
        ];
    }
}
