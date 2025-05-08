<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array

    {
        return [
            'name' => $this->faker->words(3, true),
            'pricing' => $this->faker->randomFloat(2, 10, 500), // not 'pricing'
            'category_id' => Category::factory(),
            'description' => $this->faker->sentence,
            'images' => [
                $this->faker->imageUrl(640, 480, 'product', true),
                $this->faker->imageUrl(640, 480, 'product', true),
            ],
        ];
    }
}
