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
            'name' => $this->faker->word(),
            'category_id' => Category::factory(), // ← creates and links a category
            'pricing' => $this->faker->randomFloat(2, 10, 200),
            'description' => $this->faker->sentence(),
           'images' => [$this->faker->imageUrl()],

        ];
    }
}
