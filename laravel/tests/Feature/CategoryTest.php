<?php

namespace Tests\Feature;
use App\Models\Category;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Promise\Create;
use Tests\TestCase;



class CategoryTest extends TestCase
{
    public function test_get_all_categories()
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }
    public function test_create_categories()
    {
        $data = [
            'name' => 'New Category',
        ];

        $response = $this->postJson('/api/categories', $data);

        $response->assertStatus(201);
        $response->assertJson([
            'name' => 'New Category']);
    }
    public function test_getcategoriesbyId()
    {
        $category = Category::factory()->Create();
        $response = $this->get("/api/categories/{$category->id}");

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'id',
                     'name',
                 ])
                 ->assertJson([
                     'id' => $category->id,
                     'name' => $category->name,
                 ]);

    }
    public function test_updateCategoriesbyId()
    {
        $category = Category::factory()->create();

    $data = [
        'name' => 'test_category_updated',
    ];

    $response = $this->patch("/api/categories/{$category->id}", $data);

    $response->assertStatus(200)
             ->assertJson([
                 'id' => $category->id,
                 'name' => 'test_category_updated',
             ]);
    }
    public function test_deleteCategoriesbyId()
    {
        $category = Category::factory()->create();

    $response = $this->delete("/api/categories/{$category->id}");

    $response->assertStatus(200)
             ->assertJson([
               
             ]);
    }
}
