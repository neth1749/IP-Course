<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;


class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_getAllproduct(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }
    public function test_createProduct()
    {


        // Generate product data using the factory (but do NOT persist it)
        $productData = Product::factory()->make()->toArray();

        // Send a POST request to create the product
        $response = $this->postJson('/api/products', $productData);

        // Assert status 201 Created
        $response->assertStatus(201)
        ->assertJsonFragment([
            'name' => $productData['name'],
            'description' => $productData['description'],
            'pricing' => $productData['pricing'],
            'images' => $productData['images'],
        ]);


        // Optionally check the response body

    }


}
