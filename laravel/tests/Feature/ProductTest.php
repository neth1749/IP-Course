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
    // Create a test category
    $category = Category::factory()->create();
    $productData = Product::factory()->make([
        'category_id' => $category->id,
    ])->toArray();
                // Send a POST request to create the product
                $response = $this->postJson('/api/products', $productData);

                // Assert the product was created successfully
                $response->assertStatus(201)
                        ->assertJsonFragment([
                            'name' => $productData['name'],
                            'pricing' => $productData['pricing'],
                            'description' => $productData['description'],
                        ]);
                // Assert the product exists in the database
                $this->assertDatabaseHas('products', [
                    'name' => $productData['name'],
                    'pricing' => $productData['pricing'],
                    'category_id' => $category->id
                ]);
            }
            public function test_get_product_by_id_successfully()
        {
            $product = Product::factory()->create();

            $response = $this->getJson("/api/products/{$product->id}");

            $response->assertStatus(200)
                     ->assertJson([
                         'id' => $product->id,
                         'name' => $product->name,
                         'pricing' => $product->pricing,
                         'description' => $product->description,
                     ]);
        }

        public function test_get_product_by_id_not_found()
        {
            $nonExistentId = 999;

            $response = $this->getJson("/api/products/{$nonExistentId}");

            $response->assertStatus(404)
                     ->assertJson([
                         'message' => 'Product not found',
                     ]);
        }

        public function test_update_product_successfully()
        {
            // Step 1: Create a category to associate with the product
            $category = Category::factory()->create([
                'name' => 'Electronics',
            ]);
            $product = Product::factory()->create([
                'category_id'=> $category->id
                ]);

            $updateData = [
                'name' => 'Updated Name Only',
            ];

            $response = $this->patchJson("/api/products/{$product->id}", $updateData);

            $response->assertStatus(200)->assertJson([
                    'message' => 'Product updated successfully',
                    'product' => [
                    'name' => 'Updated Name Only',
                ],
            ]);
            $this->assertDatabaseHas('products', [
                'id' => $product->id,
                'name' => 'Updated Name Only',
            ]);
        }


public function test_update_product_not_found()
{
    $nonExistentId = 999;

    $response = $this->patchJson("/api/products/{$nonExistentId}", [
        'name' => 'Non-existent Product',
    ]);

    $response->assertStatus(404)
             ->assertJson([
                 'message' => 'Product not found',
             ]);
}
public function test_product_delete_with_product_by_id()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Product deleted successfully'
                 ]);
        }

}
