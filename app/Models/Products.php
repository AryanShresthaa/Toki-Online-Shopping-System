<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
      protected $fillable = [
      'category_id',  
      'name',
        'image',
        'quantity',
        'price',
        'description',
        
    ];
     public function category(){
        return $this->belongsTo(Category::class);
    }
    public function carts()
{
    return $this->hasMany(Cart::class);
}
public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}
