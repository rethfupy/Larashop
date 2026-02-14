<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImage extends Model
{
    protected $fillable = ['image_path', 'product_id'];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
