<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Resources\API\Category\CategoryResource;
use App\Http\Resources\API\Tag\TagResource;

class FilterListController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');

        $result = [
            'categories' => CategoryResource::collection($categories),
            'tags' => TagResource::collection($tags),
            'price' => [
                'min' => $minPrice ?? 0,
                'max' => $maxPrice ?? 1000,
            ]
        ];

        return response()->json($result);
    }
}
