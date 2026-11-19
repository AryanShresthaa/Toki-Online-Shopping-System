<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
       protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'total',
        'payment_method',
        'status',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function orderItems()
{
    return $this->hasMany(OrderItem::class, 'order_id', 'id');
}
}

