<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('preview_image')) {
            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
        } else {
            unset($data['preview_image']);
        };

        $tagIds = $data['tags'] ?? [];
        unset($data['tags']);

        $productImages = $data['product_images'] ?? [];
        unset($data['product_images']);

        $product = Product::create($data);
        
        if (!empty($tagIds)) {
            $product->tags()->attach($tagIds);
        };

        if (!empty($productImages)) {
            foreach ($productImages as $image) {
                $path = Storage::disk('public')->put('images', $image);
                $product->images()->create([
                    'image_path' => $path
                ]);
            };
        };

        return redirect()->route('product.index');
    }
}
