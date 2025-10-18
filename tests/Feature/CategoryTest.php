<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_can_be_created()
    {
        $category = Category::factory()->create([
            'name' => 'Electronics'
        ]);

        $this->assertDatabaseHas('categories', [
            'category_id' => $category->category_id,
            'name' => 'Electronics'
        ]);
    }

    public function test_category_can_be_read()
    {
        $category = Category::factory()->create();

        $foundCategory = Category::find($category->category_id);

        $this->assertEquals($category->name, $foundCategory->name);
    }

    public function test_category_can_be_updated()
    {
        $category = Category::factory()->create();

        $category->update(['name' => 'Updated Category']);

        $this->assertDatabaseHas('categories', [
            'category_id' => $category->category_id,
            'name' => 'Updated Category'
        ]);
    }

    public function test_category_can_be_deleted()
    {
        $category = Category::factory()->create();

        $category->delete();

        $this->assertDatabaseMissing('categories', [
            'category_id' => $category->category_id
        ]);
    }

    public function test_category_has_many_products()
    {
        $category = Category::factory()->create();
        $products = $category->products()->createMany([
            ['name' => 'Product 1', 'price' => 100],
            ['name' => 'Product 2', 'price' => 200],
        ]);

        $this->assertCount(2, $category->products);
        $this->assertEquals('Product 1', $category->products->first()->name);
    }
}
