<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $guarded = [];

    protected $primaryKey = 'order_item_id';
}
