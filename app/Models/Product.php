<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ProductImage;

class Product extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'content', 
        'preview_image', 
        'price', 
        'stock', 
        'is_published', 
        'category_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function getPreviewImageUrlAttribute()
    {
        return $this->preview_image
            ? asset('storage/' . $this->preview_image)
            : null;
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
