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
        $productImages = $data['product_images'] ?? [];
        $deleteImagesIds = $data['delete_images'] ?? [];
        unset($data['tags'],  $data['product_images'], $data['delete_images']);

        $product->update($data);
        
        $product->tags()->sync($tagIds);

        if (!empty($productImages)) {
            foreach ($productImages as $image) {
                $path = Storage::disk('public')->put('images', $image);
                $product->images()->create([
                    'image_path' => $path
                ]);
            };
        };

        if (!empty($deleteImagesIds)) {
            $imagesToDelete = $product->images()->whereIn('id', $deleteImagesIds)->get();
            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            };
        };

        return redirect()->route('product.index');
    }
}
