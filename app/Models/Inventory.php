<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $guarded = [];

    protected $primaryKey = 'inventory_id';
}
