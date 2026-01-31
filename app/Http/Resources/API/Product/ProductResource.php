<?php

namespace App\Http\Resources\API\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\Category\CategoryResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'content' => $this->content,
            'title' => $this->title,
            'price' => $this->price,
            'stock' => $this->stock,
            'preview_image' => $this->preview_image_url,
            'category' => new CategoryResource($this->category),
        ];
    }
}
