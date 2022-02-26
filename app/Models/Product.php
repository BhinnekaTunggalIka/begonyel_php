<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price']; // field yang boleh diisi

    public function photo() //this line below dibuat
    {
        return $this->hasMany(PhotoModel::class); //karena satu product bisa punya more than one photo
    }
}
