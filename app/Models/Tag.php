<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tag extends Model
{
    protected $fillable = ['title'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags');
    }
}
