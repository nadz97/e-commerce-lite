<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $guarded = [];

    protected $primaryKey = 'discount_id';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
