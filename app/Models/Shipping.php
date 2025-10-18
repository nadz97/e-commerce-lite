<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shipping';

    protected $guarded = [];

    protected $primaryKey = 'id';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
