<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\API\Product\ProductsRequest;
use App\Http\Resources\API\Product\ProductResource;

class ProductsController extends Controller
{
    public function __invoke(ProductsRequest $request)
    {
        $productIds = $request->input('ids');
        $products = Product::whereIn('id', $productIds)
            ->where('is_published', true)
            ->get();

        return ProductResource::collection($products);
    }
}
