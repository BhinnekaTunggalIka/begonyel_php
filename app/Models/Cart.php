<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'quantity', 'description', 'table_id', 'order_id'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
