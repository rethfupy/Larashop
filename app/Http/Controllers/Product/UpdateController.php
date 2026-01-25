<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile('preview_image')) {
            if ($product->preview_image) {
                Storage::disk('public')->delete($product->preview_image);
            }

            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
        } else {
            unset($data['preview_image']);
        }

        $tagIds = $data['tags'] ?? [];
        unset($data['tags']);

        $product->update($data);
        
        $product->tags()->sync($tagIds);

        return redirect()->route('product.index');
    }
}
