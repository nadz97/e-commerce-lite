<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = [];

    protected $primaryKey = 'order_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
