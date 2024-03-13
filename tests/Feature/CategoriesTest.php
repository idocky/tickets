<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\CreatesApplication;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--env' => 'testing']);
    }

    /**
     * A basic feature test example.
     */
    public function testCategoryStore()
    {
        $categoryData = Category::factory()->make()->toArray();

        $response = $this->post('/api/v1/categories', $categoryData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('categories', $categoryData);
    }
}
