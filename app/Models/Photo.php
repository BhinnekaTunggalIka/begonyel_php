<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['photo_name', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class); //belongsTo dipake di tabel utama yang punya relasi ke tabel dengan foreign key
    }
}
