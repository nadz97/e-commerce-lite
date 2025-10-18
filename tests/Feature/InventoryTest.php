<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InventoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_inventory_for_a_product()
    {
        $product = Product::factory()->create();

        $inventory = Inventory::factory()->create([
            'product_id' => $product->id,
            'stock' => 50,
        ]);

        $this->assertDatabaseHas('inventory', [
            'id' => $inventory->id,
            'product_id' => $product->id,
            'stock' => 50,
        ]);
    }

    /** @test */
    public function it_can_read_inventory()
    {
        $inventory = Inventory::factory()->create(['stock' => 25]);

        $found = Inventory::find($inventory->id);

        $this->assertEquals(25, $found->stock);
    }

    /** @test */
    public function it_can_update_inventory_stock()
    {
        $inventory = Inventory::factory()->create(['stock' => 10]);

        $inventory->update(['stock' => 99]);

        $this->assertDatabaseHas('inventory', [
            'id' => $inventory->id,
            'stock' => 99,
        ]);
    }

    /** @test */
    public function it_can_delete_inventory()
    {
        $inventory = Inventory::factory()->create();

        $inventory->delete();

        $this->assertDatabaseMissing('inventory', [
            'id' => $inventory->id,
        ]);
    }

    /** @test */
    public function an_inventory_belongs_to_a_product()
    {
        $inventory = Inventory::factory()->create();

        $this->assertInstanceOf(Product::class, $inventory->product);
        $this->assertEquals($inventory->product_id, $inventory->product->id);
    }

    /** @test */
    public function a_product_has_one_inventory()
    {
        $product = Product::factory()->create();
        $inventory = Inventory::factory()->create(['product_id' => $product->id]);

        $this->assertInstanceOf(Inventory::class, $product->inventory);
        $this->assertEquals($inventory->id, $product->inventory->id);
    }
}
