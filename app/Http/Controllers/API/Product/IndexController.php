<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\API\Product\ProductListResource;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Filters\API\ProductFilter;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)
            ->where('is_published', true)    
            ->paginate($data['productsPerPage'], ['*'], 'page', $data['page']);
            
        return ProductListResource::collection($products);
    }
}
