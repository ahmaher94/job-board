<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(5, 7));
        $dateTime = $this->faker->dateTimeBetween('-1 month', 'now');
        $content = '';

        for($i=0; $i<5; $i++) {
            $content .= '<p class="mb-4">' . $this->faker->sentence(rand(5,7), true) . '</p>';
        }
        
        return [
            'title' => $title,
            'slug' => Str::slug($title). '-' . rand(1111, 9999),
            'company' => $this->faker->company,
            'location' => $this->faker->country,
            'is_highlighted' => (rand(1, 9) > 7),
            'is_active' => true,
            'content' => $content,
            'apply_link' => $this->faker->url,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];
    }
}
