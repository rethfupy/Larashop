<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\API\Product\ProductListResource;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::where('is_published', true)->get();
        return ProductListResource::collection($products);
    }
}
