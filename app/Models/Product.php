<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = [];

    protected $primaryKey = 'product_id';

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
